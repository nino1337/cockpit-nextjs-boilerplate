import propTypes from 'prop-types';
import React from 'react';

import * as CockpitComponent from '../cockpit';

const availableComponents = {
  button: CockpitComponent.Button,
  heading: CockpitComponent.Heading,
  grid: CockpitComponent.Grid,
  text: CockpitComponent.Text,
};

const CockpitComponents = ({ components }) =>
  components.map(({ component, settings, columns }, index) => {
    if (!availableComponents[component]) return null;

    const Component = availableComponents[component];

    return <Component {...settings} columns={columns} key={`component-${index}`} />;
  });

CockpitComponents.propTypes = {
  components: propTypes.array,
};

export default CockpitComponents;
