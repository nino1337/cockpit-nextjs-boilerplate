import propTypes from 'prop-types';
import React from 'react';

import * as S from './Image.styles';

const Image = ({ isCockpitImage = true, image, height, width }) => (
  <S.Image
    height={height}
    width={width}
    alt={image.meta && image.meta.title}
    src={isCockpitImage ? process.env.COCKPIT_BASE_URL + image.path : image.path}
  />
);

Image.propTypes = {
  image: propTypes.exact({
    meta: propTypes.exact({
      title: propTypes.string,
      asset: propTypes.string,
    }),
    path: propTypes.string,
  }).isRequired,
  height: propTypes.string,
  width: propTypes.string,
  isCockpitImage: propTypes.bool,
};

export default Image;
