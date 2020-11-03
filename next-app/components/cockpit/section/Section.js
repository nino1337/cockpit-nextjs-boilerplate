import propTypes from 'prop-types';
import React from 'react';
import { Container } from 'reactstrap';

import CockpitComponents from '../../cockpitComponents/CockpitComponents';
import * as S from './Section.styles';

const Section = ({ variant, componentChildren, isFullWidth }) => (
  <S.Section variant={variant}>
    <Container fluid={isFullWidth}>
      <CockpitComponents components={componentChildren} />
    </Container>
  </S.Section>
);

Section.propTypes = {
  variant: propTypes.oneOf(['white', 'primary', 'secondary', 'accent']),
  componentChildren: propTypes.array,
  isFullWidth: propTypes.bool,
};

export default Section;
