export const breakpoints = {
  sm: 480,
  md: 768,
  lg: 992,
  xl: 1200,
};

const mq = Object.keys(breakpoints).reduce((accumulator, label) => {
  accumulator[label] = `@media screen and (min-width: ${breakpoints[label] / 16}em)`;
  return accumulator;
}, {});

export default mq;
