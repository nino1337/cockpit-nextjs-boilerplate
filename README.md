# Cockpit CMS + Next.js Boilerplate

This repository serves as a boilerplate to kickstart projects, where a content-management-system is needed (e.g. customer projects), but where you also don't want to miss newest frontend-technologies, react and next, to name them.

## Technologies used

### Cockpit CMS

- [Homepage](https://getcockpit.com)
- [Github Repository](https://github.com/agentejo/cockpit)

[Cockpit](https://getcockpit.com) hereby serves as our [headless cms](https://en.wikipedia.org/wiki/Headless_content_management_system). Cockpit is php based, thus brings the advantage, that no node is required on our hosting server.

### Next.js

- [Homepage](https://nextjs.org/)
- [Github Repository](https://github.com/vercel/next.js/)

[Next.js](https://nextjs.org/) on the other hand is used to generate our [static web page](https://en.wikipedia.org/wiki/Static_web_page). While exporting our app, it will pre-render every page, we defined, which brings several advantages, like SEO-friendliness and performance boosts.

## Getting started

Before starting to set up the workflow, make sure to have **Node** and **docker** installed on your machine and of course to clone this repo.

1. open a terminal of your choice and navigate into the root of our repository
2. install all dependencies with `npm i`
3. initialise the workflow with `npm run init`
4. once done, run `npm start`
5. under http://localhost:8080 you should now be able to log-in with admin/admin. On http://localhost:3000 you should see the frontend with some pre-defined pages you can navigate to.
6. happy coding

## Important Information

#### Don't touch the storage folder (unless you know, what you are doing)

- files in the storage folder are in sync with files laying on out docker container (see volumes in docker-compose file)
- thus, editing or maintaining something in cockpit, automatically changes files on our local machine and vice versa
- this brings advantages like the import of initial data on start up and to have synchronous data across the team, so make sure to check them into git aswell

#### Master API Key mast match env variable

- in cockpit under http://localhost:8080/restadmin/index a MASTER API Key is created, that must match the COCKPIT_API_KEY in our .env.local file
  ![Cockpit CMS Master API Key](/assets/cockpit-master-api-key.png)
  ![env VARIABLES](/assets/env-vars.png)

#### Adding new Pages

- singletons are represented as pages, thus our first step is to add a singleton in cockpit
- open **[page].js** in our client folder, and add the name of the singleton we just created to the **getStaticPaths Function** as a new page

> Make sure, that the singleton name and the page name must be equal. Furthermore, the page name also represents the url-slug, where the page can be reached at.
