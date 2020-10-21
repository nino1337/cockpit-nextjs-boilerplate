# Cockpit CMS + Next.js Boilerplate

## Cockpit CMS

- [Homepage](https://getcockpit.com)
- [Github Repository](https://github.com/agentejo/cockpit)

## Next.js

- [Next.js Documentation](https://nextjs.org/docs)
- [Github Repository](https://github.com/vercel/next.js/)

## Getting started

- navigate into the cockit-cms folder
- run `npm start`, to download the appropriate docker container from agentejo and start it
- when the container finished starting, run `docker:copyFiles`
- once it finished copying our exported files to the docker container, run `npm run docker:login`
- on the docker container, run `./cp import --src ./cockpitData`

### export files

- `npm run docker:login`
- `sudo docker cp cockpit:/cockpitData ./cockpitData`
