import Link from 'next/link';
import { useContext } from 'react';
import urlSlug from 'url-slug';

import LocalizationContext from '../../localization/context';

const Navigation = () => {
  const localizedData = useContext(LocalizationContext);

  return (
    <ul>
      {localizedData.pages.map((page) => {
        if (!page.published || !page.menu.header) return null;
        return (
          <li key={page.title}>
            <Link href={page.url || urlSlug(page.title)}>{page.title}</Link>
          </li>
        );
      })}
    </ul>
  );
};

export default Navigation;
