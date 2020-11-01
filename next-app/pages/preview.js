import React, { useContext, useEffect, useState } from 'react';

import { collections, singletons } from '../axios';
import Layout from '../components/layout/Layout';
import LocalizationContext from '../localization/context';

export default function Preview() {
  const context = useContext(LocalizationContext);
  const [currentPage, setCurrentPage] = useState({});

  useEffect(() => {
    const handlePreviewData = (event) => {
      setCurrentPage(event.data.entry);
    };
    window.addEventListener('message', handlePreviewData);

    return () => {
      window.removeEventListener('message', handlePreviewData);
    };
  });

  return (
    <LocalizationContext.Provider value={{ ...context, currentPage }}>
      <Layout />
    </LocalizationContext.Provider>
  );
}

export async function getStaticProps() {
  const availablePages = await collections.get('/get/pages');
  const siteSettings = await singletons.get('/get/siteSettings');

  return {
    props: { currentPage: {}, pages: availablePages.data, siteSettings: siteSettings.data },
  };
}
