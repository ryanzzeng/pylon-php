FROM php:8.1-fpm

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync && install-php-extensions \
  @composer \
  intl

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
ENV PATH="/root/.composer/vendor/bin:${PATH}"
COPY docker/php/conf.d/custom.ini $PHP_INI_DIR/conf.d/custom.ini

WORKDIR /app