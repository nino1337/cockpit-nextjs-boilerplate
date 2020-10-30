import propTypes from 'prop-types';
import React from 'react';

import { Button } from '../cockpit';

const availableComponents = {
  button: Button,
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
