import Head from "next/head";

import { singletons } from "../axios";

export default function Page({ data }) {
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

// params must equal singleton names created in the cockpit cms
export async function getStaticPaths() {
  return {
    paths: [
      { params: { page: "about" } },
      { params: { page: "services" } },
      { params: { page: "impressum" } },
      { params: { page: "datenschutz" } },
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
