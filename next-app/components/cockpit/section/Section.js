import propTypes from 'prop-types';
import React from 'react';

import CockpitComponents from '../../cockpitComponents/CockpitComponents';
import * as S from './Section.styles';

const Section = ({ variant, componentChildren }) => (
  <S.Section variant={variant}>
    <CockpitComponents components={componentChildren} />
  </S.Section>
);

Section.propTypes = {
  variant: propTypes.oneOf(['white', 'primary', 'secondary', 'accent']),
  componentChildren: propTypes.array,
};

export default Section;
