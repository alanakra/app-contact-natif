FROM php:7.4-cli
COPY . /adds/index.php
WORKDIR /usr/src/myapp
CMD [ "php", "./adds/index.php" ]


FROM httpd:2.4
COPY ./adds/index.php/ /usr/local/apache2/htdocs/ 

