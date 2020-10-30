import propTypes from 'prop-types';
import React from 'react';

import * as S from './Heading.styles';

const Headline = ({ tag, text }) => <S.Headline as={tag}>{text}</S.Headline>;

Headline.propTypes = {
  tag: propTypes.string,
  text: propTypes.string,
};

export default Headline;
