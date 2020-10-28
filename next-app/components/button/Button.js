import propTypes from 'prop-types';
import React from 'react';

import * as S from './Button.styles';

const Button = ({ children, color, bgColor, disabled }) => {
  return (
    <S.Button color={color} bgColor={bgColor} disabled={disabled}>
      {children}
    </S.Button>
  );
};

Button.propTypes = {
  children: propTypes.any,
  color: propTypes.string,
  bgColor: propTypes.string,
  disabled: propTypes.bool,
};

export default Button;
