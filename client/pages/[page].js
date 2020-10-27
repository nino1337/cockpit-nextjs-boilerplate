import { collections, singletons } from '../axios';
import Layout from '../components/layout/Layout';

export default function Page() {
  return <Layout />;
}

/**
 * documentation: https://nextjs.org/docs/basic-features/data-fetching#getstaticpaths-static-generation
 * getStaticPaths gets executed when `next export` is executed
 * files in this directory are placed within the [page]-directory
 * the [page]-directory gets named, when we export our app
 * e.g. page: 'services', the output after exporting the app would be:
 * /out
 *  /services
 *   /index.html
 * This means, that next has pre rendered our page, which brings advantages like SEO-friendliness etc.
 * The tradeoff here is, that we need to define the pages in here. So we need to know priorly, which pages will exist in our App.
 * We could also fetch all singletons from the backend and handle routing purely on the client side, but this would also keep us from pre rendering our pages.
 */

// params must equal singleton names created in the cockpit cms
export async function getStaticPaths() {
  return {
    paths: [
      { params: { page: 'about' }, locale: 'en' },
      { params: { page: 'about' }, locale: 'de' },
      { params: { page: 'services' }, locale: 'en' },
      { params: { page: 'services' }, locale: 'de' },
      { params: { page: 'impressum' }, locale: 'en' },
      { params: { page: 'impressum' }, locale: 'de' },
      { params: { page: 'datenschutz' }, locale: 'en' },
      { params: { page: 'datenschutz' }, locale: 'de' },
    ],
    fallback: false,
  };
}

/**
 * documentation: https://nextjs.org/docs/basic-features/data-fetching#getstaticprops-static-generation
 * is used to pass parameters to our page components, enabling nextjs to prerender the webpage with content on it
 */
export async function getStaticProps(context) {
  const pages = await singletons.get(`/get/${context.params.page}`);
  const mainNavigation = await collections.get('/get/mainNavigation');
  const pageProps = Object.assign(pages.data, mainNavigation.data[0]);

  return {
    props: pageProps,
  };
}
