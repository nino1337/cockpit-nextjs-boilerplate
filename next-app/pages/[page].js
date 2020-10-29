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
 */
export async function getStaticPaths() {
  const availablePages = await singletons.get('/listSingletons');
  const paths = availablePages.data.reduce((paths, currentPage) => {
    return [...paths, { params: { page: currentPage } }];
  }, []);

  return {
    paths,
    fallback: false,
  };
}

/**
 * documentation: https://nextjs.org/docs/basic-features/data-fetching#getstaticprops-static-generation
 * is used to pass parameters to our page components, enabling nextjs to prerender the webpage with content on it
 */
export async function getStaticProps(context) {
  const pagesData = await singletons.get(`/get/${context.params.page}`);
  const mainNavigation = await collections.get('/get/mainNavigation');
  const pageProps = Object.assign(pagesData.data, mainNavigation.data[0]);

  return {
    props: pageProps,
  };
}
