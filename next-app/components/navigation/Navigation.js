import Link from 'next/link';
import { useContext } from 'react';

import LocalizationContext from '../../localization/context';

const Navigation = () => {
  const localizedData = useContext(LocalizationContext);

  return (
    <ul>
      {localizedData.pages.map((page) => {
        if (!page.published || !page.menu.header) return null;
        return (
          <li key={page.title}>
            <Link href={page.url || page.title_slug}>{page.title}</Link>
          </li>
        );
      })}
    </ul>
  );
};

export default Navigation;
