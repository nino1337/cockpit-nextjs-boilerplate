import { Global } from '@emotion/core';
import { ThemeProvider } from 'emotion-theming';
import Router from 'next/router';
import propTypes from 'prop-types';
import React, { useEffect } from 'react';

import LocalizationContext from '../localization/context';
import globalStyle from '../styles/globalStyles';
import theme from '../styles/theme';
function MyApp({ Component, pageProps }) {
  useEffect(() => {
    // redirect to 404 page if page is not published
    if (!pageProps.currentPage || !pageProps.currentPage.published) {
      const errorPageSettings = pageProps.pages.find(
        (page) => page._id === pageProps.siteSettings[404]._id
      );

      Router.push(errorPageSettings.url || errorPageSettings.title_slug);
    }
  }, []);

  return (
    <ThemeProvider theme={theme(pageProps.siteSettings)}>
      <Global styles={globalStyle} />

      <LocalizationContext.Provider value={pageProps}>
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
