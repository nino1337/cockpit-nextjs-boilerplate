import { Global } from '@emotion/core';
import { ThemeProvider } from 'emotion-theming';
import { useRouter } from 'next/router';
import propTypes from 'prop-types';
import React from 'react';

import LocalizationContext from '../localization/context';
import extractDataFromLocalization from '../localization/extractDataFromLocalization';
import globalStyle from '../styles/globalStyles';
import theme from '../styles/theme';
function MyApp({ Component, pageProps }) {
  const router = useRouter();
  const localizedData = extractDataFromLocalization(router.locale, pageProps);

  return (
    <ThemeProvider theme={theme}>
      <Global styles={globalStyle} />
      <LocalizationContext.Provider value={localizedData}>
        <Component {...pageProps} />
      </LocalizationContext.Provider>
    </ThemeProvider>
  );
}

MyApp.propTypes = {
  Component: propTypes.any,
  pageProps: propTypes.object,
};

export default MyApp;
