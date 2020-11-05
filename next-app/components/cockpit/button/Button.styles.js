import { css } from '@emotion/core';
import styled from '@emotion/styled';

export const Button = styled.a`
  cursor: pointer;
  border-radius: 3px;
  display: block;
  min-width: 200px;
  max-width: 100%;
  padding: 1rem;
  text-align: center;
  transition: color 0.2s, background-color 0.2s;
  width: fit-content;

  ${({ variant, theme }) =>
    variant === 'primary' &&
    css`
      background-color: ${theme.colors.grey};
      color: ${theme.colors.white};
    `}

  ${({ variant, theme }) =>
    variant === 'secondary' &&
    css`
      background-color: ${theme.colors.white};
      border: 1px solid ${theme.colors.grey};
      color: ${theme.colors.grey};
    `}

    ${({ variant, theme }) =>
    variant === 'ghost' &&
    css`
      background-color: ${theme.colors.white};
      padding: 0;
      min-width: auto;
      color: ${theme.colors.grey};
      text-decoration: underline;
    `}

  &[disabled] {
    color: ${({ theme }) => theme.colors.white} !important;
    background-color: ${({ theme }) => theme.colors.grey} !important;
  }
`;
