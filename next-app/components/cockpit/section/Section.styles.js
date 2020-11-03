import { css } from '@emotion/core';
import styled from '@emotion/styled';

import mq from '../../../styles/mq';

export const Section = styled.section`
  padding: 2.4rem 0;
  width: 100%;

  ${mq.md} {
    padding: 3.2rem 0;
  }

  ${({ variant, theme }) =>
    variant === 'white' &&
    css`
      background-color: ${theme.colors.white};
      color: ${theme.colors.text};
    `}

  ${({ variant, theme }) =>
    variant === 'primary' &&
    css`
      background-color: ${theme.colors.sections.primary.background};
      color: ${theme.colors.sections.primary.text};
    `}

  ${({ variant, theme }) =>
    variant === 'secondary' &&
    css`
      background-color: ${theme.colors.sections.secondary.background};
      color: ${theme.colors.sections.secondary.text};
    `}

  ${({ variant, theme }) =>
    variant === 'accent' &&
    css`
      background-color: ${theme.colors.sections.accent.background};
      color: ${theme.colors.sections.accent.text};
    `}
`;
