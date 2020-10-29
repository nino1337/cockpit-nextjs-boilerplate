import Head from 'next/head';
import propTypes from 'prop-types';

import { collections } from '../axios';

export default function Error({ data }) {
  return (
    <div>
      <Head>
        <title>{data.currentPage.title}</title>
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <h1>{data.currentPage.title}</h1>
    </div>
  );
}

Error.propTypes = {
  data: propTypes.object,
};

export async function getStaticProps() {
  const availablePages = await collections.get('/get/pages');
  const pagesData = availablePages.data.find((page) => page.title === '404');

  return {
    props: { currentPage: pagesData, pages: availablePages.data },
  };
}
