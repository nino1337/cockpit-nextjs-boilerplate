import tinycolor from 'tinycolor2';

const getSaturation = (color) => {
  var rgb = tinycolor(color).toRgb();
  var maxRGB = Math.max(rgb.r, rgb.g, rgb.b) / 255;
  var minRGB = Math.min(rgb.r, rgb.g, rgb.b) / 255;
  var luminance = tinycolor(color).getLuminance();

  return luminance === 1 ? 0 : ((maxRGB - minRGB) / (1 - Math.abs(2 * luminance - 1))) * 100;
};

// if color saturation is over desired saturation, desaturate it
export const getDesaturatedColor = (color) => {
  const saturation = getSaturation(color);
  const desiredSaturation = 80;
  let desaturationlevel = 0;

  if (saturation > desiredSaturation) {
    desaturationlevel = saturation - desiredSaturation;
  }

  return tinycolor(color).desaturate(desaturationlevel).toString();
};
/**
 * https://www.w3.org/TR/WCAG20-TECHS/G18.html
 * @param {string} backgroundColor - section background
 * @param {array} textColors - text colors
 * @returns {string} text color that is most readable on the given
 */
export const getTextColor = (backgroundColor, ...textColors) => {
  return tinycolor.mostReadable(backgroundColor, textColors).toHexString();
};
