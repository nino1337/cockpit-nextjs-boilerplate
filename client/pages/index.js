import Head from "next/head";
import { singletons } from "../axios";

export default function Home({ data }) {
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

export async function getStaticProps() {
  const response = await singletons.get("/get/home");
  return {
    props: {
      data: response.data,
    },
  };
}
