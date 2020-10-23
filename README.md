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

### Set up cockpit cms

1. open a terminal of your choice and navigate into the cockpit-cms folder
2. run `npm run docker`, to download and start the appropriate docker container from agentejo
3. once the container finished starting, run `npm run docker:login`
4. on the docker container, run `./cp import --src ./cockpitData` to import our initial data to cockpit
5. now navigate to http://localhost:8080 and log-in with admin/admin. When everything worked out fine, you should now see 6 added singletons on the right
6. as a last step - in cockpit - navigate to SETTINGS -> API ACCESS and generate a MASTER API-KEY, that is later used as a token to communicate between the client and cockpit

![Cockpit CMS Master API Key](/assets/cockpit-master-api-key.png)

### Set up next.js

1. after finishing our cockpit configuration, navigate into the client folder
2. run `npm i` to install all the dependencies needed
3. when all modules have been installed, create an **.env** file and an **.env.production** file
4. open the **.env** file and add 2 variables

![env VARIABLES](/assets/env-vars.png)

> **COCKPIT-API-KEY** yields the MASTER API-KEY, we generated in cockpit.
> **API-BASE-URL** is the base url, where our docker service runs. Make sure to adjust, if you've started the cockpit container on another port.

5. start the workflow with `npm run dev`. Open http://localhost:3000 and navigate between the pages. For now, they just yield a headline, that is maintained in cockpit.

## How it works

...

## How-To's

### Export cockpit files

If you've used the cockpit cms to change data, like adding more singletons, fields, etc., you have to make sure, to keep your lokal cockpitData in sync with the data you changed on the container.

1. `npm run docker:login`
2. `./cp export --target cockpitData`
3. `sudo docker cp cockpit:/var/www/html/cockpitData ./cockpitData`

### Adding new pages

1. singletons are represented as pages, thus our first step is to add a singleton in cockpit
2. open **[page].js** in our client folder, and add the name of the singleton we just created to the **getStaticPaths Function** as a new page

> Make sure, that the singleton name and the page name must be equal. Furthermore, the page name also represents the url-slug, where the page can be reached at.
