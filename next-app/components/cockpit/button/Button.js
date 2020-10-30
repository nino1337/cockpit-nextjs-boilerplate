import propTypes from 'prop-types';
import React from 'react';

import * as S from './Button.styles';

const Button = ({ text, variant = 'primary', disabled = false, url }) => {
  console.log(variant);
  return (
    <S.Button variant={variant} disabled={disabled} href={url}>
      {text}
    </S.Button>
  );
};

Button.propTypes = {
  text: propTypes.string,
  variant: propTypes.string,
  disabled: propTypes.bool,
  url: propTypes.string,
};

export default Button;
