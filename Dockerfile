FROM php:8.3-apache
LABEL authors="Geiselberger"

ENTRYPOINT ["top", "-b"]

COPY src/ /var/www/html/
EXPOSE 80