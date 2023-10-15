FROM php:8.1-apache-buster

# Surpresses debconf complaints of trying to install apt packages interactively
# https://github.com/moby/moby/issues/4032#issuecomment-192327844
 
ARG DEBIAN_FRONTEND=noninteractive

# Update
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get --no-install-recommends install -y apt-utils && \
    rm -rf /var/lib/apt/lists/*


# Install useful tools and install important libaries
RUN apt-get -y update && \
    apt-get -y --no-install-recommends install nano wget \
dialog \
libsqlite3-dev \
libsqlite3-0 && \
    apt-get -y --no-install-recommends install default-mysql-client \
zlib1g-dev \
libzip-dev \
libicu-dev && \
    apt-get -y --no-install-recommends install --fix-missing apt-utils \
build-essential \
git \
curl \
libonig-dev && \ 
    apt-get install -y iputils-ping && \
    apt-get -y --no-install-recommends install --fix-missing libcurl4 \
libcurl4-openssl-dev \
zip \
openssl && \
    rm -rf /var/lib/apt/lists/* && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install xdebug
RUN pecl install xdebug-3.1.4 && \
    docker-php-ext-enable xdebug && \
    mkdir /var/log/xdebug

# Install redis
RUN pecl install redis-5.3.3 && \
    docker-php-ext-enable redis

# Install imagick
RUN apt-get update && \
    apt-get -y --no-install-recommends install --fix-missing libmagickwand-dev && \
    rm -rf /var/lib/apt/lists/*

# Workarround until imagick is available in pecl with php8 support
# Imagick Commit to install
# https://github.com/Imagick/imagick
ARG IMAGICK_COMMIT="661405abe21d12003207bc8eb0963fafc2c02ee4"

RUN cd /usr/local/src && \
    git clone https://github.com/Imagick/imagick && \
    cd imagick && \
    git checkout ${IMAGICK_COMMIT} && \
    phpize && \
    ./configure && \
    make && \
    make install && \
    cd .. && \
    rm -rf imagick && \
    docker-php-ext-enable imagick

# Other PHP8 Extensions

RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-install pdo_sqlite && \
    docker-php-ext-install bcmath && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install curl && \
    docker-php-ext-install zip && \
    docker-php-ext-install -j$(nproc) intl && \
    docker-php-ext-install mbstring && \
    docker-php-ext-install gettext && \
    docker-php-ext-install calendar && \
    docker-php-ext-install exif


# Install Freetype 
RUN apt-get -y update && \
    apt-get --no-install-recommends install -y libfreetype6-dev \
libjpeg62-turbo-dev \
libpng-dev && \
    rm -rf /var/lib/apt/lists/* && \
    docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Insure an SSL directory exists
RUN mkdir -p /etc/apache2/ssl
#- ./www:/var/www/html:rw
#- ./config/php/php.ini:/usr/local/etc/php/php.ini
#- ./config/ssl:/etc/apache2/ssl/
#- ./config/apache2/apache2.conf:/etc/apache2/apache2.conf
#- ./config/vhosts:/etc/apache2/sites-enabled
#- ./logs/apache2:/var/log/apache2
COPY ./www /var/www/html
COPY ./config/php/php.ini /usr/local/etc/php/php.ini
COPY ./config/ssl /etc/apache2/ssl/
COPY ./config/apache2/apache2.conf /etc/apache2/apache2.conf
COPY ./logs/apache2 /var/log/apache2

COPY ./config/vhosts/cadete-defensayseguridad-eu.conf /etc/apache2/sites-available/cadete-defensayseguridad-eu.conf
RUN a2dissite 000-default
RUN a2ensite cadete-defensayseguridad-eu




# Enable SSL support
RUN a2enmod ssl && a2enmod rewrite

# Enable apache modules
RUN a2enmod rewrite headers

    # Paso 2: Instalar módulos y habilitar el módulo proxy
    #RUN a2enmod proxy proxy_http

    # Paso 3: Copiar el archivo de configuración del reverse proxy al contenedor
    #COPY apache-reverse-proxy.conf /etc/apache2/sites-available/

    # Paso 4: Habilitar el sitio del reverse proxy
    #RUN a2ensite apache-reverse-proxy

    # Paso 5: Reiniciar Apache para que los cambios surtan efecto
    
    RUN service apache2 restart

    # Paso 6: Copiar tus archivos PHP y otros recursos al contenedor (dependiendo de tu proyecto)

    # Paso 7: Exponer el puerto del servidor web
   RUN rm -rf /usr/src/*

EXPOSE 80
EXPOSE 443

ENTRYPOINT ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]






# Cleanup
RUN rm -rf /usr/src/*
