import Head from 'next/head';
import propTypes from 'prop-types';
import React, { useContext } from 'react';

import LocalizationContext from '../../localization/context';
import Navigation from '../navigation/Navigation';

const Layout = ({ children }) => {
  const localizedData = useContext(LocalizationContext);

  return (
    <>
      <Head>
        <title>{localizedData.metaTitle}</title>
        <meta name="description" content={localizedData.metaDescription} />
        <link rel="icon" href="/favicon.ico" />
      </Head>
      <Navigation />
      <h1>{localizedData.headline}</h1>
      {children}
    </>
  );
};

Layout.propTypes = {
  children: propTypes.any,
};

export default Layout;
