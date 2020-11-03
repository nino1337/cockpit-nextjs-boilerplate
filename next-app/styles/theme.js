import * as helper from './helper';

const shadows = '#1B2D2D';
const white = '#ffffff';
const midtones = '#F89B1F';
const highlights = '#F5E1D3';
const accent = '#4FBEC4';

const theme = {
  colors: {
    white,
    grey: '#333333',
    error: '#e85555',
    text: shadows,
    primary: midtones,
    secondary: highlights,
    accent,
    sections: {
      primary: {
        text: helper.getTextColor(helper.getDesaturatedColor(midtones), shadows, white),
        background: helper.getDesaturatedColor(midtones),
      },
      secondary: {
        text: helper.getTextColor(helper.getDesaturatedColor(highlights), shadows, white),
        background: helper.getDesaturatedColor(highlights),
      },
      accent: {
        text: helper.getTextColor(helper.getDesaturatedColor(accent), shadows, white),
        background: helper.getDesaturatedColor(accent),
      },
    },
  },
  fonts: {
    primary: 'Sofia',
    secondary: 'Avantgarde',
  },
};

export default theme;
