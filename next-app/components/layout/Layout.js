import Head from 'next/head';
import propTypes from 'prop-types';
import React, { useContext } from 'react';

import LocalizationContext from '../../localization/context';
import Navigation from '../navigation/Navigation';

const Layout = ({ children }) => {
  const localizedData = useContext(LocalizationContext);

  console.log(localizedData);

  return (
    <>
      <Head>
        <title>{localizedData.currentPage.metaTitle}</title>
        <meta name="description" content={localizedData.currentPage.metaDescription} />
        <link rel="icon" href="/favicon.ico" />
      </Head>
      <Navigation />
      <h1>{localizedData.currentPage.title}</h1>
      {children}
    </>
  );
};

Layout.propTypes = {
  children: propTypes.any,
};

export default Layout;
