FROM ubuntu:24.04

WORKDIR /var/devcanvas

RUN apt update && apt upgrade -y
RUN apt install php libapache2-mod-php php-cli curl -y
RUN apt install php-mysql php-curl -y
RUN apt install git-all -y

COPY composer /usr/bin

RUN composer global require laravel/installer

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.0/install.sh | bash
RUN nvm install 22

COPY data .

RUN init.sh

RUN npm install && npm run build
RUN composer run dev

CMD php artisan serve
EXPOSE 8000
