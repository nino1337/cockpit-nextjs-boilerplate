/* eslint-disable react/prop-types */
import '@testing-library/jest-dom/extend-expect';
import 'jest-axe/extend-expect';

import { Global } from '@emotion/core';
import { render } from '@testing-library/react';
import { ThemeProvider } from 'emotion-theming';
import { matchers } from 'jest-emotion';
import React from 'react';

import globalStyles from '../styles/globalStyles';
import theme from '../styles/theme';

const Wrapper = ({ children }) => (
  <ThemeProvider theme={theme}>
    <Global styles={globalStyles} />
    {children}
  </ThemeProvider>
);

const customRender = (ui, options) => render(ui, { wrapper: Wrapper, ...options });

expect.extend(matchers);
// re-export everything
export * from '@testing-library/react';
export * from 'jest-axe';
export { default as userEvent } from '@testing-library/user-event';

// override render method
export { customRender as render };
