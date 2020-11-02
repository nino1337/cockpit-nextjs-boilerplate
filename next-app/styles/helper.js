import tinycolor from 'tinycolor2';

const getSaturation = (color) => {
  var rgb = tinycolor(color).toRgb();
  var maxRGB = Math.max(rgb.r, rgb.g, rgb.b) / 255;
  var minRGB = Math.min(rgb.r, rgb.g, rgb.b) / 255;
  var luminance = tinycolor(color).getLuminance();

  return luminance === 1 ? 0 : ((maxRGB - minRGB) / (1 - Math.abs(2 * luminance - 1))) * 100;
};

export const getDesaturatedColor = (color) => {
  return getSaturation(color) > 80 ? tinycolor(color).desaturate(25).toString() : color;
};
