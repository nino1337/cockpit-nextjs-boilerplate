import Head from 'next/head';
import propTypes from 'prop-types';

import { singletons } from '../axios';

export default function Error({ data }) {
  return (
    <div>
      <Head>
        <title>{data.headline}</title>
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <h1>{data.headline}</h1>
    </div>
  );
}

Error.propTypes = {
  data: propTypes.object,
};

export async function getStaticProps() {
  const response = await singletons.get('/get/error');
  return {
    props: {
      data: response.data,
    },
  };
}
