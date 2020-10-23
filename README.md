# Cockpit CMS + Next.js Boilerplate

This repository serves as a boilerplate to kickstart projects, where a content-management-system is needed (e.g. customer projects), but where you also don't want to miss newest frontend-technologies, react and next, to name them.

## Technologies used

### Cockpit CMS

- [Homepage](https://getcockpit.com)
- [Github Repository](https://github.com/agentejo/cockpit)

[Cockpit](https://getcockpit.com) serves as our [headless cms](https://en.wikipedia.org/wiki/Headless_content_management_system). Cockpit is php based, thus brings the advantage, that no node is required on our hosting server.

### Next.js

- [Homepage](https://nextjs.org/)
- [Github Repository](https://github.com/vercel/next.js/)

[Next.js](https://nextjs.org/) on the other hand is used to generate our [static web page](https://en.wikipedia.org/wiki/Static_web_page). While exporting our app, it will pre-render every page, we defined, which brings several advantages, like SEO-friendliness and performance boosts.

### Jest 

- [Homepage](https://jestjs.io/)
- [Github Repository](https://github.com/facebook/jest)

Jest is a delightful JavaScript Testing Framework with a focus on simplicity.

### React-testing-library

- [Homepage](https://testing-library.com/)
- [Github Repository](https://github.com/testing-library)

React Testing Library builds on top of DOM Testing Library by adding APIs for working with React components.

### Emotion

- [Homepage](https://emotion.sh/docs/introduction)
- [Github Repository](https://github.com/emotion-js/emotion)

Emotion is a library designed for writing css styles with JavaScript. It provides powerful and predictable style composition in addition to a great developer experience with features such as source maps, labels, and testing utilities. Both string and object styles are supported.

## Getting started

Before starting to set up the workflow, make sure to have **Node** and **docker** installed on your machine and of course to clone this repo.

1. Open a terminal of your choice and navigate into the root of our repository.
2. Install all dependencies with `npm i`.
3. Initialise the workflow with `npm run init`.
4. Once done, run `npm start`.
5. Under http://localhost:8080 you should now be able to log-in with admin/admin. On http://localhost:3000 you should see the frontend with some pre-defined pages you can navigate to.
6. Happy coding

## Important Information

#### Don't touch the storage folder (unless you know, what you are doing)

- Files in the storage folder are in sync with files laying on our docker container (see volumes in docker-compose file)
- Thus, editing or maintaining something in cockpit, automatically changes files on our local machine and vice versa
- This brings advantages like importing of initial data on start up and having synchronous data across the team, so make sure to check them into git aswell

#### Master API Key mast match env variable

- in cockpit under http://localhost:8080/restadmin/index a MASTER API Key is created, that must match the COCKPIT_API_KEY in our .env.local file
  ![Cockpit CMS Master API Key](/assets/cockpit-master-api-key.png)
  ![env VARIABLES](/assets/env-vars.png)

#### Adding new Pages

- singletons are represented as pages, thus our first step is to add a singleton in cockpit
- open **[page].js** in our client folder, and add the name of the singleton we just created to the **getStaticPaths Function** as a new page

> Make sure, that the singleton name and the page name are equal. Furthermore, the page name also represents the url-slug, hence where the page can be reached at.
