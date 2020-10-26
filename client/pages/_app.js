import { Global } from '@emotion/core';
import { ThemeProvider } from 'emotion-theming';
import Link from 'next/link';
import propTypes from 'prop-types';

import globalStyle from '../styles/globalStyles';
import theme from '../styles/theme';

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

MyApp.propTypes = {
  Component: propTypes.any,
  pageProps: propTypes.object,
};

export default MyApp;
