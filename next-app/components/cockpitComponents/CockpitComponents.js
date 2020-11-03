import propTypes from 'prop-types';
import React from 'react';

import * as CockpitComponent from '../cockpit';

const availableComponents = {
  button: CockpitComponent.Button,
  heading: CockpitComponent.Heading,
  grid: CockpitComponent.Grid,
  divider: CockpitComponent.Divider,
  text: CockpitComponent.Text,
  section: CockpitComponent.Section,
  gallery: CockpitComponent.Gallery,
  image: CockpitComponent.Image,
};

const CockpitComponents = ({ components }) =>
  components.map(({ component, settings, columns, children }, index) => {
    if (!availableComponents[component]) return null;

    const Component = availableComponents[component];

    return (
      <Component
        {...settings}
        columns={columns}
        componentChildren={children}
        key={`component-${index}`}
      />
    );
  });

CockpitComponents.propTypes = {
  components: propTypes.array,
};

export default CockpitComponents;
