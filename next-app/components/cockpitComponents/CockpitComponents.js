import propTypes from 'prop-types';
import React from 'react';

import * as CockpitComponent from '../cockpit';

const availableComponents = {
  button: CockpitComponent.Button,
  heading: CockpitComponent.Heading,
};

const CockpitComponents = ({ components }) =>
  components.map(({ component, settings }, index) => {
    if (!availableComponents[component]) return null;

    const Component = availableComponents[component];

    return <Component {...settings} key={`component-${index}`} />;
  });

CockpitComponents.propTypes = {
  components: propTypes.array,
};

export default CockpitComponents;
