import { collections } from '../axios';
import Layout from '../components/layout/Layout';

export default function Home() {
  return <Layout />;
}

export async function getStaticProps() {
  const availablePages = await collections.get('/get/pages');
  const pagesData = availablePages.data.find((page) => page.title === 'Startseite');

  return {
    props: { currentPage: pagesData, pages: availablePages.data },
  };
}
