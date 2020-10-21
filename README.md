# Cockpit CMS + Next.js Boilerplate

## Cockpit CMS

- [Homepage](https://getcockpit.com)
- [Github Repository](https://github.com/agentejo/cockpit)

## Next.js

- [Next.js Documentation](https://nextjs.org/docs)
- [Github Repository](https://github.com/vercel/next.js/)

## Getting started

### Starting the cockpit-cms docker container and import initial data

- navigate into the cockpit-cms folder
- run `npm run docker`, to download and start the appropriate docker container from agentejo
- once the container finished starting, run `docker:copyFiles`
- after copying our cockpitData to the docker container, run `npm run docker:login`
- on the docker container, run `./cp import --src ./cockpitData` to import our initial data to our cockpit-cms
- now navigate to localhost:8080 and login with admin/admin
- when everything worked out, you should now see 6 added singletons on the right

### export files

- `npm run docker:login`
- `sudo docker cp cockpit:/var/www/html/cockpitData ./cockpitData`
