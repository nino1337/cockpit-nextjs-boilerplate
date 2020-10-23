import styled from "@emotion/styled";

import mq from "../../styles/mq";

export const Button = styled.button`
  appearance: none;
  background-color: ${({ backgroundColor, theme }) =>
    backgroundColor || theme.colors.white};
  border: none;
  border-radius: 3px;
  color: ${({ color, theme }) => color || theme.colors.text};
  display: block;
  min-width: 200px;
  max-width: 100%;
  padding: 1rem;
  text-align: center;
  transition: color 0.2s, background-color 0.2s;
  width: fit-content;

  ${mq.md} {
    &:hover {
      color: ${({ backgroundColor, theme }) =>
        backgroundColor || theme.colors.white};
      background-color: ${({ color, theme }) => color || theme.colors.text};
    }
  }

  &[disabled] {
    color: ${({ theme }) => theme.colors.white} !important;
    background-color: ${({ theme }) => theme.colors.grey} !important;
  }
`;
