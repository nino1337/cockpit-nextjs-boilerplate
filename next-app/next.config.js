const withImages = require('next-images');

module.exports = withImages({
  inlineImageLimit: 16384,
  env: {
    COCKPIT_API_KEY: process.env.COCKPIT_API_KEY,
    COCKPIT_BASE_URL: process.env.COCKPIT_BASE_URL,
  },
  tralingSlash: true,
  exportTrailingSlash: true,
  webpack: (config) => {
    config.module.rules.push({
      test: /\.(eot|ttf|woff|woff2)$/,
      use: {
        loader: 'url-loader',
        options: {
          limit: 100000,
        },
      },
    });
    return config;
  },
});
