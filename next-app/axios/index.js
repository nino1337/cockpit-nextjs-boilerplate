import axios from 'axios';

const PARAMS = {
  params: {
    token: process.env.COCKPIT_API_KEY,
  },
};

const singletons = axios.create({
  baseURL: `${process.env.COCKPIT_BASE_URL}/api/singletons`,
  ...PARAMS,
});

/**
 * basic collection response:
 *  {
 *   fields: {
 *     fieldName: {
 *       name: 'fieldName',
 *       type: 'fieldType',
 *       localize: boolean,
 *       options: [Object]
 *     }
 *   },
 *   entries: [
 *     {
 *       fieldName: [Array],
 *       fieldName_en: [Array],
 *     }
 *   ],
 *   total: 1
 *  }
 * thus, we extract entries in transformResponse as we don't need fields
 */
const collections = axios.create({
  baseURL: `${process.env.COCKPIT_BASE_URL}/api/collections`,
  ...PARAMS,
  transformResponse: axios.defaults.transformResponse.concat((data) => {
    return data.entries;
  }),
});

const forms = axios.create({
  baseURL: `${process.env.COCKPIT_BASE_URL}/api/forms`,
  ...PARAMS,
});

export { singletons, collections, forms };
