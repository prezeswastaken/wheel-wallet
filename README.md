# How to run this?
## 1. Start backend services. To do this:
- `cd backend-wheel-wallet`
- copy **.env.example** file to **.env** file and adjust it to your likink
- now you need to install composer dependencies to this project with a **temporary docker container**. To do this, run
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
- run `./vendor/bin/sail up -d`
- now install composer dependencies **INSIDE** of created docker container. To do this, run `./vendor/bin/sail composer install`
- now you can check if the api is up by accessing localhost/api/hello route. If you get json response, congratulations! You have now successully run **Wheel Wallet** backend server!
## 2. Great! Now you have to run frontend. To do this:
- run `cd frontend-wheel-wallet`
- install **npm dependencies** in local folder. To do this, run `docker run --rm -v ${PWD}:/app -w /app node npm install`
- run `docker-compose up -d`
- now you have fully functional Wheel Wallet app!


## Protip
If you encounter some file permission errors while running sail, add those two lines of code to your .env file inside of **backend-wheel-wallet** folder
```
WWWGROUP=1000
WWWUSER=1000
```