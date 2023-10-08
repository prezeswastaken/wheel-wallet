FROM node:latest

ENV NODE_ENV=development

WORKDIR /app

EXPOSE 3000

COPY package.json yarn.lock* ./

ENV NUXT_HOST=0.0.0.0
ENV NUXT_PORT=3000

ENV PATH=./node_modules/.bin/:$PATH

COPY . .

