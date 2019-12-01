FROM laradock/php-fpm:2.0-72

ARG APP_CODE_PATH_CONTAINER
ARG COMPOSE_PROJECT_NAME
ARG ENV
ENV APP_CODE_PATH_CONTAINER ${APP_CODE_PATH_CONTAINER}

#####################################
# Set Timezone to Asia/Tokyo
#####################################

ARG TZ=Asia/Tokyo
ENV TZ ${TZ}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#####################################
# Necessary tools
#####################################
RUN apt-get update -yqq \
    && apt-get -y install git \
    && apt-get -y install vim

#####################################
# User Aliases
#####################################
USER root

COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/php-fpm/aliases.sh /root/aliases.sh

RUN sed -i 's/\r//' /root/aliases.sh && \
    echo "" >> ~/.bashrc && \
    echo "# Load Custom Aliases" >> ~/.bashrc && \
    echo "source ~/aliases.sh" >> ~/.bashrc && \
	echo "" >> ~/.bashrc

#####################################
# PHP REDIS EXTENSION FOR PHP 7.0
#####################################

ARG INSTALL_PHPREDIS=false
RUN if [ ${INSTALL_PHPREDIS} = true ]; then \
    # Install Php Redis Extension
    printf "\n" | pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis \
;fi

#####################################
# ZipArchive:
#####################################

ARG INSTALL_ZIP_ARCHIVE=false
RUN if [ ${INSTALL_ZIP_ARCHIVE} = true ]; then \
    # Install the zip extension
    docker-php-ext-install zip \
;fi

#####################################
# bcmath:
#####################################

ARG INSTALL_BCMATH=false
RUN if [ ${INSTALL_BCMATH} = true ]; then \
    # Install the bcmath extension
    docker-php-ext-install bcmath \
;fi

#####################################
# PHP Memcached:
#####################################

ARG INSTALL_MEMCACHED=false
RUN if [ ${INSTALL_MEMCACHED} = true ]; then \
    # Install the php memcached extension
    curl -L -o /tmp/memcached.tar.gz "https://github.com/php-memcached-dev/php-memcached/archive/php7.tar.gz" \
    && mkdir -p memcached \
    && tar -C memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
    && ( \
        cd memcached \
        && phpize \
        && ./configure \
        && make -j$(nproc) \
        && make install \
    ) \
    && rm -r memcached \
    && rm /tmp/memcached.tar.gz \
    && docker-php-ext-enable memcached \
;fi

#####################################
# Opcache:
#####################################

ARG INSTALL_OPCACHE=false
RUN if [ ${INSTALL_OPCACHE} = true ]; then \
    docker-php-ext-install opcache \
;fi

# Copy opcache configration
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/php-fpm/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

#####################################
# Mysqli Modifications:
#####################################

ARG INSTALL_MYSQLI=false
RUN if [ ${INSTALL_MYSQLI} = true ]; then \
    docker-php-ext-install mysqli \
;fi

#####################################
# Tokenizer Modifications:
#####################################

ARG INSTALL_TOKENIZER=false
RUN if [ ${INSTALL_TOKENIZER} = true ]; then \
    docker-php-ext-install tokenizer \
;fi

#####################################
# SMTP:
#####################################

ARG INSTALL_SMTP=false

ARG SMTP_HOST
ARG SMTP_PORT
ENV SMTP_HOST ${SMTP_HOST}
ENV SMTP_PORT ${SMTP_PORT}

RUN if [ ${INSTALL_SMTP} = true ]; then \
    apt-get -y update \
    && apt-get install -y ssmtp mailutils \
;fi

###########################################################################
# Blackfire:
###########################################################################

ARG INSTALL_BLACKFIRE=false

RUN if [ ${INSTALL_BLACKFIRE} = true ]; then \
    version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
    && curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/amd64/$version \
    && tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp \
    && mv /tmp/blackfire-*.so $(php -r "echo ini_get('extension_dir');")/blackfire.so \
    && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8707\n" > $PHP_INI_DIR/conf.d/blackfire.ini \
;fi

#####################################
# Copy Conf files:
#####################################

ADD ./docker/config/${COMPOSE_PROJECT_NAME}/common/php-fpm/laravel.ini        /usr/local/etc/php/conf.d
ADD ./docker/config/${COMPOSE_PROJECT_NAME}/common/php-fpm/xlaravel.pool.conf /usr/local/etc/php-fpm.d/
ADD ./docker/config/${COMPOSE_PROJECT_NAME}/common/php-fpm/php.ini            /usr/local/etc/php/php.ini

RUN usermod -u 1000 www-data

#
#--------------------------------------------------------------------------
# Final Touch
#--------------------------------------------------------------------------
#

#RUN rm -r /var/lib/apt/lists/*

WORKDIR ${APP_CODE_PATH_CONTAINER}

#####################################
# Check PHP version:
#####################################

RUN php -v | head -n 1 | grep -q "PHP 7.2."

CMD ["php-fpm"]

EXPOSE 9000
