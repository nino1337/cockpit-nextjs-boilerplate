import { Global } from '@emotion/core';
import { ThemeProvider } from 'emotion-theming';
import { useRouter } from 'next/router';
import propTypes from 'prop-types';
import { useEffect, useState } from 'react';
import React from 'react';

import LocalizationContext from '../localization/context';
import getTranslationsFromPage from '../localization/getTranslationsFromPage';
import globalStyle from '../styles/globalStyles';
import theme from '../styles/theme';
function MyApp({ Component, pageProps }) {
  const [localizedData, setLocalizedData] = useState(null);
  const router = useRouter();

  useEffect(() => {
    const navigatorLanguage = navigator.language || navigator.userLanguage;

    setLocalizedData(getTranslationsFromPage(navigatorLanguage, pageProps));
    // keep app state in sync with current page
  }, [router.asPath]);

  return (
    <ThemeProvider theme={theme}>
      <Global styles={globalStyle} />
      {localizedData && (
        <LocalizationContext.Provider value={localizedData}>
          <Component {...pageProps} />
        </LocalizationContext.Provider>
      )}
    </ThemeProvider>
  );
}

MyApp.propTypes = {
  Component: propTypes.any,
  pageProps: propTypes.object,
};

export default MyApp;
