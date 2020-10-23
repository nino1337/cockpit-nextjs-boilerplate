import Link from "next/link";
import { ThemeProvider } from "emotion-theming";
import { Global } from "@emotion/core";

import theme from "../styles/theme";
import globalStyle from "../styles/globalStyles";

function MyApp({ Component, pageProps }) {
  return (
    <ThemeProvider theme={theme}>
      <Global styles={globalStyle} />
      <ul>
        <li>
          <Link href="/">Startseite</Link>
        </li>
        <li>
          <Link href="/services">Services</Link>
        </li>
        <li>
          <Link href="/about">Über uns</Link>
        </li>
        <li>
          <Link href="/impressum">Impressum</Link>
        </li>

        <li>
          <Link href="/datenschutz">Datenschutz</Link>
        </li>
      </ul>

      <Component {...pageProps} />
    </ThemeProvider>
  );
}

export default MyApp;
