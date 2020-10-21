import axios from "axios";

const PARAMS = {
  params: {
    token: process.env.COCKPIT_API_KEY,
  },
};

const singletons = axios.create({
  baseURL: `${process.env.API_BASE_URL}/api/singletons`,
  ...PARAMS,
});

const collections = axios.create({
  baseURL: `${process.env.API_BASE_URL}/api/collections`,
  ...PARAMS,
});

const forms = axios.create({
  baseURL: `${process.env.API_BASE_URL}/api/forms`,
  ...PARAMS,
});

export { singletons, collections, forms };
