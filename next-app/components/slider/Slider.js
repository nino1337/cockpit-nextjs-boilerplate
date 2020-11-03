import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';

import propTypes from 'prop-types';
import React from 'react';
import SlickSlider from 'react-slick';

import { Image } from '../cockpit';

const Slider = ({ items, settings = {} }) => {
  const defaultSettings = {
    autoplay: false,
    infinite: true,
  };

  const sliderSettings = { ...defaultSettings, ...settings };
  return (
    <SlickSlider {...sliderSettings}>
      {items.map((item) => (
        <Image image={item} key={item.meta.title} />
      ))}
    </SlickSlider>
  );
};

Slider.propTypes = {
  items: propTypes.array,
  settings: propTypes.object,
};

export default Slider;
