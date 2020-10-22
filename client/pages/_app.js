import Link from "next/link";

function MyApp({ Component, pageProps }) {
  return (
    <>
      <ul>
        <li>
          <Link href="/">Startseite</Link>
        </li>
        <li>
          <Link href="/services">Services</Link>
        </li>
        <li>
          <Link href="/about">Über uns</Link>
        </li>
        <li>
          <Link href="/impressum">Impressum</Link>
        </li>

        <li>
          <Link href="/datenschutz">Datenschutz</Link>
        </li>
      </ul>

      <Component {...pageProps} />
    </>
  );
}

export default MyApp;
