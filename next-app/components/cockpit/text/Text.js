import propTypes from 'prop-types';
import React from 'react';

import * as S from './Text.styles';

const Text = ({ text }) => <S.Text dangerouslySetInnerHTML={{ __html: text }} />;

Text.propTypes = {
  text: propTypes.string,
};

export default Text;
