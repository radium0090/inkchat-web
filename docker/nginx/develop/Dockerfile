ARG NGINX_VERSION
FROM nginx:${NGINX_VERSION}-alpine

ARG APP_CODE_PATH_CONTAINER
ARG COMPOSE_PROJECT_NAME
ARG ENV
ARG WEB_SERVER_HTTP_PORT
ARG WEB_SERVER_HTTPS_PORT
ARG PHP_UPSTREAM_CONTAINER
ARG PHP_UPSTREAM_PORT

ENV APP_CODE_PATH_CONTAINER ${APP_CODE_PATH_CONTAINER}
ENV WEB_SERVER_HTTP_PORT    ${WEB_SERVER_HTTP_PORT}
ENV WEB_SERVER_HTTPS_PORT   ${WEB_SERVER_HTTPS_PORT}

#####################################
# Set Timezone
#####################################

RUN apk --update add tzdata && \
    cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime && \
    apk del tzdata && \
    rm -rf /var/cache/apk/* && \
    apk add --no-cache tzdata

#####################################
# Install Reqiured Packages
#####################################

RUN apk update \
    && apk upgrade \
    && apk --update add logrotate \
    && apk add --no-cache openssl \
    && apk add --no-cache bash

#####################################
# Add Groups and Users
#####################################

RUN set -x ; \
    addgroup -g 82 -S www-data ; \
    adduser -u 82 -D -S -G www-data www-data && exit 0 ; exit 1

# Create 'messages' file used from 'logrotate'
RUN touch /var/log/messages

#####################################
# Copy Config File
#####################################
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/nginx/nginx.conf   /etc/nginx/

#####################################
# Copy SSL Files
#####################################
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/nginx/ssl/default.crt     /etc/nginx/ssl/default.crt
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/nginx/ssl/default.csr     /etc/nginx/ssl/default.csr
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/nginx/ssl/default.key     /etc/nginx/ssl/default.key

#####################################
# Copy Configure Files
#####################################
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/nginx/logrotate/nginx     /etc/logrotate.d/
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/nginx/sites/app.conf      /etc/nginx/sites-available/app.conf

##################################################
# Set upstream conf and remove the default
##################################################
RUN echo "upstream php-upstream { server ${PHP_UPSTREAM_CONTAINER}:${PHP_UPSTREAM_PORT}; }" > /etc/nginx/conf.d/upstream.conf \
    && rm /etc/nginx/conf.d/default.conf

ADD ./docker/config/${COMPOSE_PROJECT_NAME}/common/nginx/startup.sh /opt/startup.sh
RUN sed -i 's/\r//g' /opt/startup.sh
CMD ["/bin/bash", "/opt/startup.sh"]

##################################################
# Finally
##################################################

EXPOSE ${WEB_SERVER_HTTP_PORT} ${WEB_SERVER_HTTPS_PORT}

WORKDIR ${APP_CODE_PATH_CONTAINER}
