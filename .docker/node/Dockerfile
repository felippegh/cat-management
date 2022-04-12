FROM node:lts-alpine

RUN apk --no-cache add bash

RUN npm install -g @vue/cli@latest @vue/cli-service@latest

USER node

#RUN mkdir -p /var/www/html/cat-management

WORKDIR /home/node/app
