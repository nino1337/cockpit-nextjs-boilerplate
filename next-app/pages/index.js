import { collections } from '../axios';
import Button from '../components/button/Button';
import Layout from '../components/layout/Layout';
import theme from '../styles/theme';

export default function Home() {
  return (
    <Layout>
      <Button bgColor={theme.colors.grey} color={theme.colors.white}>
        Button
      </Button>
    </Layout>
  );
}

export async function getStaticProps() {
  const availablePages = await collections.get('/get/pages');
  const pagesData = availablePages.data.find((page) => page.title === 'Startseite');

  return {
    props: { currentPage: pagesData, pages: availablePages.data },
  };
}
