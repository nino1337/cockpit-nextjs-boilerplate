import * as helper from './helper';

const theme = {
  colors: {
    white: '#ffffff',
    grey: '#333333',
    error: '#e85555',
    text: '#1B2D2D',
    primary: helper.getDesaturatedColor('#F89B1F'),
    secondary: helper.getDesaturatedColor('#F5E1D3'),
    accent: helper.getDesaturatedColor('#4FBEC4'),
  },
  fonts: {
    primary: 'Sofia',
    secondary: 'Avantgarde',
  },
};

export default theme;
