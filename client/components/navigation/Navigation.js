import Link from 'next/link';
import { useContext } from 'react';

import LocalizationContext from '../../localization/context';

const Navigation = () => {
  const localizedData = useContext(LocalizationContext);
  return (
    <ul>
      {localizedData.mainNavigationItems.map(({ value }) => (
        <li key={value.title}>
          <Link href={value.url}>{value.title}</Link>
        </li>
      ))}
    </ul>
  );
};

export default Navigation;
