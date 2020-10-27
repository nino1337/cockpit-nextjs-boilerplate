/**
 * given:
 *
 * data:
 * {
 *  headline: "Startseite",
 *  headline_en: "Main Page",
 *  metaDescription: "Startseite-Beschreibung",
 *  metaDescription_en: "Main Page Description",
 *  metaTitle: "Startseite",
 *  metaTitle_en: "Main Page"
 * }
 * localization: en_US
 *
 * output:
 * {
 *  headline: "Main Page",
 *  metaDesciption: "Main Page Description",
 *  metaTitle: "Main Page"
 * }
 *
 * First step: normalize the localization, e.g. if someone enters our page with en_US normalize it to just en
 * Second step: filter out every key, where the name contains the localization. In the example above, we receive headline_en, metaTitle_en and metaDescription_en
 * Notice - if no key for the current localization is found, we default it to the german localization
 * Last step: create a new object with keys, that don't have a language reference in them. This brings us the advantage, that we can use the same keys everywhere in our app.
 * @param {string} localization - browser language
 * @param {object} data - page props
 */
const extractDataFromLocalization = (localization, data) => {
  let normalizedLocalization = localization.length === 5 ? localization.substr(0, 2) : localization;
  const localizedDataKeys = Object.keys(data).filter(
    (key) => key.substr(key.length - 3) === `_${normalizedLocalization}`
  );

  if (normalizedLocalization === 'de' || localizedDataKeys.length === 0) return data;

  const localizedData = localizedDataKeys.reduce((pageProps, currentKey) => {
    const keyWithoutLocalization = currentKey.substr(0, currentKey.length - 3);
    return { ...pageProps, [keyWithoutLocalization]: data[currentKey] };
  }, {});

  return localizedData;
};

export default extractDataFromLocalization;
