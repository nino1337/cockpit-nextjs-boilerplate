module.exports = {
  plugins: ['emotion'],
  presets: [['next/babel', { 'preset-env': { useBuiltIns: 'entry', corejs: '2' } }]],
};
