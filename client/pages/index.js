import Head from "next/head";

import theme from "../styles/theme";
import { singletons } from "../axios";
import Button from "../components/button/Button";

export default function Home({ data }) {
  return (
    <div>
      <Head>
        <title>{data.metaTitle}</title>
        <meta name="description" content={data.metaDescription} />
        <link rel="icon" href="/favicon.ico" />
      </Head>

      <h1>{data.headline}</h1>
      <Button backgroundColor={theme.colors.grey} color={theme.colors.white}>
        Button
      </Button>
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
