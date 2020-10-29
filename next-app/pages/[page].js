import urlSlug from 'url-slug';

import { collections } from '../axios';
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
  const availablePages = await collections.get('/get/pages');

  const paths = availablePages.data.reduce((paths, currentPage) => {
    return [...paths, { params: { page: currentPage.url || urlSlug(currentPage.title) } }];
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
  const availablePages = await collections.get('/get/pages');
  const pagesData = availablePages.data.find(
    (page) => urlSlug(page.title) === context.params.page || page.url === context.params.page
  );

  return {
    props: { currentPage: pagesData, pages: availablePages.data },
  };
}
