import React from 'react';
import * as S from './Button.styles';

const Button = ({ children, type, color, backgroundColor, disabled }) => {
  return (
    <S.Button
      type={type}
      color={color}
      backgroundColor={backgroundColor}
      disabled={disabled}
    >
      {children}
    </S.Button>
  );
};

export default Button;
