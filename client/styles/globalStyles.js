import { css } from "@emotion/core";

// fonts
import SofiaLight from "./fonts/sofia/SofiaProLight.ttf";
import SofiaBold from "./fonts/sofia/SofiaProBold.ttf";
import AvantGardeBook from "./fonts/avantgarde/ITCAvantGardeStd-Bk.ttf";
import AvantGardeBold from "./fonts/avantgarde/ITCAvantGardeStd-Bold.ttf";

const dynamicStyle = (theme) => css`
  @font-face {
    font-family: ${theme.fonts.primary};
    src: url(${SofiaLight});
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: ${theme.fonts.primary};
    src: url(${SofiaBold});
    font-weight: bold;
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: ${theme.fonts.secondary};
    src: url(${AvantGardeBook});
    font-style: normal;
    font-display: swap;
  }

  @font-face {
    font-family: ${theme.fonts.secondary};
    src: url(${AvantGardeBold});
    font-weight: bold;
    font-style: normal;
    font-display: swap;
  }

  html {
    box-sizing: border-box;
    font-size: 62.5%;
  }

  *,
  *:before,
  *:after {
    box-sizing: inherit;
  }

  body {
    color: ${theme.colors.text};
    font-family: ${theme.fonts.primary};
    font-size: 1.6rem;
    line-height: 1.6rem;
    margin: 0;
  }

  img {
    display: block;
    height: auto;
    max-width: 100%;
  }

  ul,
  ol {
    margin: 0;
    padding: 0;
  }
`;

export default dynamicStyle;
