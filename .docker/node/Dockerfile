FROM node:16-alpine

RUN apk --no-cache add bash

RUN npm install -g @vue/cli@latest @vue/cli-service@latest

RUN mkdir -p /var/www/html/cat-management

WORKDIR /var/www/html/cat-management
