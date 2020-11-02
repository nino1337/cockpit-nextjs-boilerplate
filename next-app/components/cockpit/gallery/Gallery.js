import propTypes from 'prop-types';
import React from 'react';

import Slider from '../../slider/Slider';

const Gallery = ({ gallery }) => {
  return <Slider items={gallery} />;
};

Gallery.propTypes = {
  gallery: propTypes.array,
};

export default Gallery;
