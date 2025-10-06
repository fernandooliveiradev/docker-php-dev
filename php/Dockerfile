FROM php:8.3-fpm-alpine

# Instalar dependências necessárias
RUN apk add --no-cache \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxml2-dev \
    imagemagick-dev \
    libwebp-dev \
    libxpm-dev \
    libvpx-dev \
    freetype-dev \
    libmcrypt-dev \
    libffi-dev \
    curl-dev \
    openssl-dev \
    libxslt-dev \
    gmp-dev \
    icu-dev

# Instalar extensões PHP que precisam ser compiladas
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install -j$(nproc) \
    gd \
    pdo_mysql \
    mysqli \
    zip \
    opcache \
    xsl \
    gmp \
    intl \
    bcmath \
    soap \
    exif \
    pcntl \
    sockets

# Instalar extensões PECL (Imagick)
RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    imagemagick-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apk del .build-deps

# Limpar cache
RUN rm -rf /var/cache/apk/*

# Criar diretório para sessões
RUN mkdir -p /var/lib/php/sessions && chmod 777 /var/lib/php/sessions

# Copiar arquivo de configuração personalizado
COPY custom.ini /usr/local/etc/php/conf.d/custom.ini

# Expor porta 9000
EXPOSE 9000

CMD ["php-fpm"]