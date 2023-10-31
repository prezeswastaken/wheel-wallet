FROM node:20.8.0-bookworm

ENV NODE_ENV=development

WORKDIR /app

EXPOSE 3000

RUN npm install -g bun@1.0.7

ENV NUXT_HOST=0.0.0.0
ENV NUXT_PORT=3000

ENV PATH=./node_modules/.bin/:$PATH

COPY . .

