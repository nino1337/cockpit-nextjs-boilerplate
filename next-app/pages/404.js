import { collections, singletons } from '../axios';
import Layout from '../components/layout/Layout';

export default function Error() {
  return <Layout />;
}

export async function getStaticProps() {
  const availablePages = await collections.get('/get/pages');
  const siteSettings = await singletons.get('/get/siteSettings');
  const pagesData = availablePages.data.find((page) => page._id === siteSettings.data[404]._id);

  return {
    props: { currentPage: pagesData, pages: availablePages.data },
  };
}
