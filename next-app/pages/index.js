import { collections, singletons } from '../axios';
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
  const pages = await singletons.get('/get/home');
  const mainNavigation = await collections.get('/get/mainNavigation');
  const pageProps = Object.assign(pages.data, mainNavigation.data[0]);

  return {
    props: pageProps,
  };
}
