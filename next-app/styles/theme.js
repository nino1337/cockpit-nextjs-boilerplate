const theme = (settings) => ({
  colors: {
    white: '#ffffff',
    grey: '#333333',
    error: '#e85555',
    text: settings.textColor,
    primary: settings.primaryColor,
    secondary: settings.secondaryColor,
    accent: settings.accentColor,
    sections: {
      primary: {
        text: settings.textColor,
        background: settings.primaryColor,
      },
      secondary: {
        text: settings.textColor,
        background: settings.secondaryColor,
      },
      accent: {
        text: settings.textColor,
        background: settings.accentColor,
      },
    },
  },
  fonts: {
    primary: 'Sofia',
    secondary: 'Avantgarde',
  },
});

export default theme;
