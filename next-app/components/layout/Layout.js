import Head from 'next/head';
import React, { useContext } from 'react';

import LocalizationContext from '../../localization/context';
import CockpitComponents from '../cockpitComponents/CockpitComponents';
import Navigation from '../navigation/Navigation';
import * as S from './Layout.styles';

const Layout = () => {
  const { currentPage } = useContext(LocalizationContext);

  return (
    <>
      <Head>
        <title>{currentPage.metaTitle}</title>
        <meta name="description" content={currentPage.metaDescription} />
        {!currentPage.indexable && <meta name="robots" content="noindex" />}
        <link rel="icon" href="/favicon.ico" />
      </Head>
      <Navigation />
      <S.Main>
        {currentPage.components && <CockpitComponents components={currentPage.components} />}
      </S.Main>
    </>
  );
};

export default Layout;
