import Head from 'next/head';
import propTypes from 'prop-types';

import { singletons } from '../axios';

export default function Page({ data }) {
  return (
    <div>
      <Head>
        <title>{data.metaTitle}</title>
        <meta name="description" content={data.metaDescription} />
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <h1>{data.headline}</h1>
    </div>
  );
}

Page.propTypes = {
  data: propTypes.object,
};

// params must equal singleton names created in the cockpit cms
export async function getStaticPaths() {
  return {
    paths: [
      { params: { page: 'about' } },
      { params: { page: 'services' } },
      { params: { page: 'impressum' } },
      { params: { page: 'datenschutz' } },
    ],
    fallback: false,
  };
}

export async function getStaticProps(context) {
  const response = await singletons.get(`/get/${context.params.page}`);
  return {
    props: {
      data: response.data,
    },
  };
}
