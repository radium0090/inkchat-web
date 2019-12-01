FROM laradock/workspace:2.0-72

ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
ARG COMPOSE_PROJECT_NAME
ARG ENV
ENV APP_CODE_PATH_CONTAINER ${APP_CODE_PATH_CONTAINER}

#####################################
# Reduce the size of the final image:
#####################################
RUN rm /var/log/lastlog /var/log/faillog

#####################################
# Non-Root User:
#####################################

# Add a non-root user to prevent files being created with root permissions on host machine.
ARG USER=${USER}
ARG PUID=${PUID}
ARG PGID=${PGID}

ENV USER ${USER}
ENV PUID ${PUID}
ENV PGID ${PGID}

RUN groupadd -g ${PGID} ${USER} && \
    useradd -u ${PUID} -g ${USER} -m ${USER} && \
    usermod -p "*" ${USER}

#####################################
# Set Timezone to Asia/Tokyo
#####################################

ARG TZ=${TZ}
ENV TZ ${TZ}
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

#####################################
# Composer:
#####################################

# Add the composer.json
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/backend/composer.json /home/${USER}/.composer/composer.json

# Make sure that ~/.composer belongs to application user
RUN chown -R ${USER}:${USER} /home/${USER}/.composer
USER ${USER}

# Check if global install need to be ran
ARG COMPOSER_GLOBAL_INSTALL=false
ENV COMPOSER_GLOBAL_INSTALL ${COMPOSER_GLOBAL_INSTALL}
RUN if [ ${COMPOSER_GLOBAL_INSTALL} = true ]; then \
    # run the install
    export COMPOSER_ALLOW_SUPERUSER=1 \
    composer global install \
;fi

ARG COMPOSER_REPO_PACKAGIST
ENV COMPOSER_REPO_PACKAGIST ${COMPOSER_REPO_PACKAGIST}

RUN if [ ${COMPOSER_REPO_PACKAGIST} ]; then \
    composer config -g repo.packagist composer ${COMPOSER_REPO_PACKAGIST} \
;fi

#####################################
# Crontab
#####################################

USER root

RUN touch /etc/cron.d/scheduler && echo "* * * * * root cd ${APP_CODE_PATH_CONTAINER} && php artisan schedule:run > /dev/null 2>&1" > /etc/cron.d/scheduler
RUN chmod -R 644 /etc/cron.d

#####################################
# User Aliases
#####################################

USER root

COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/backend/aliases.sh /root/aliases.sh
COPY ./docker/config/${COMPOSE_PROJECT_NAME}/common/backend/aliases.sh /home/${USER}/aliases.sh

RUN sed -i 's/\r//' /root/aliases.sh && \
    sed -i 's/\r//' /home/${USER}/aliases.sh && \
    chown ${USER}:${USER} /home/${USER}/aliases.sh && \
    echo "" >> ~/.bashrc && \
    echo "# Load Custom Aliases" >> ~/.bashrc && \
    echo "source ~/aliases.sh" >> ~/.bashrc && \
	echo "" >> ~/.bashrc

USER ${USER}

RUN echo "" >> ~/.bashrc && \
    echo "# Load Custom Aliases" >> ~/.bashrc && \
    echo "source ~/aliases.sh" >> ~/.bashrc && \
	echo "" >> ~/.bashrc

#####################################
# PHP REDIS EXTENSION FOR PHP 7.2
#####################################

ARG INSTALL_PHPREDIS=false
ENV INSTALL_PHPREDIS ${INSTALL_PHPREDIS}
RUN if [ ${INSTALL_PHPREDIS} = true ]; then \
    # Install Php Redis extension
    printf "\n" | pecl -q install -o -f redis && \
    echo "extension=redis.so" >> /etc/php/7.2/mods-available/redis.ini && \
    phpenmod redis \
;fi

#####################################
# REDIS SERVER
#####################################

USER root
ARG INSTALL_REDIS_SERVER=false
ENV INSTALL_REDIS_SERVER ${INSTALL_REDIS_SERVER}
RUN if [ ${INSTALL_REDIS_SERVER} = true ]; then \
    # Install redis server
    apt-get update -yqq && \
    apt-get -y install redis-server \
;fi

#####################################
# PYTHON:
#####################################

USER root
ARG INSTALL_PYTHON=false
ENV INSTALL_PYTHON ${INSTALL_PYTHON}
RUN if [ ${INSTALL_PYTHON} = true ]; then \
  apt-get update \
  && apt-get -y install python python-pip python-dev build-essential  \
  && pip install --upgrade pip  \
;fi

#####################################
# Non-root user : PHPUnit path
#####################################

# add ./vendor/bin to non-root user's bashrc (needed for phpunit)
USER ${USER}

RUN echo "" >> ~/.bashrc && \
    echo 'export PATH="${WEB_ROOT_DIR}/vendor/bin:$PATH"' >> ~/.bashrc

#####################################
# Laravel Installer:
#####################################

USER root

ARG COMPOSER_REPO_PACKAGIST
ENV COMPOSER_REPO_PACKAGIST ${COMPOSER_REPO_PACKAGIST}

RUN if [ ${COMPOSER_REPO_PACKAGIST} ]; then \
    composer config -g repo.packagist composer ${COMPOSER_REPO_PACKAGIST} \
;fi

ARG INSTALL_LARAVEL_INSTALLER=false
ENV INSTALL_LARAVEL_INSTALLER ${INSTALL_LARAVEL_INSTALLER}

RUN if [ ${INSTALL_LARAVEL_INSTALLER} = true ]; then \
    # Install the Laravel Installer
	echo "" >> ~/.bashrc && \
	echo 'export PATH="~/.composer/vendor/bin:$PATH"' >> ~/.bashrc \
	&& composer global require "laravel/installer" \
;fi

USER ${USER}

#####################################
# MySQL Client:
#####################################

USER root
ARG INSTALL_MYSQL_CLIENT=false
ENV INSTALL_MYSQL_CLIENT ${INSTALL_MYSQL_CLIENT}
RUN if [ ${INSTALL_MYSQL_CLIENT} = true ]; then \
    # Install the mysql clint
    apt-get update -yqq && \
    apt-get -y install mysql-client \
;fi

#####################################
# Node / NVM:
#####################################

USER root
# Check if NVM needs to be installed
ARG NODE_VERSION=stable
ENV NODE_VERSION ${NODE_VERSION}
ARG INSTALL_NODE=false
ENV INSTALL_NODE ${INSTALL_NODE}
ENV NVM_DIR /root/.nvm
ARG NPM_REGISTRY
ENV NPM_REGISTRY ${NPM_REGISTRY}
RUN if [ ${INSTALL_NODE} = true ]; then \
    # Install nvm (A Node Version Manager)
    curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.1/install.sh | bash && \
        . $NVM_DIR/nvm.sh && \
        nvm install ${NODE_VERSION} && \
        nvm use ${NODE_VERSION} && \
        nvm alias ${NODE_VERSION} \
;fi

# Wouldn't execute when added to the RUN statement in the above block
# Source NVM when loading bash since ~/.profile isn't loaded on non-login shell
RUN if [ ${INSTALL_NODE} = true ]; then \
    echo "" >> ~/.bashrc && \
    echo 'export NVM_DIR="$HOME/.nvm"' >> ~/.bashrc && \
    echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm' >> ~/.bashrc \
;fi

# Add NVM binaries to root's .bashrc
USER root

RUN if [ ${INSTALL_NODE} = true ]; then \
    echo "" >> ~/.bashrc && \
    echo 'export NVM_DIR="/home/${USER}/.nvm"' >> ~/.bashrc && \
    echo '[ -s "$NVM_DIR/nvm.sh" ] && . "$NVM_DIR/nvm.sh"  # This loads nvm' >> ~/.bashrc \
;fi

# Add PATH for node
ENV PATH $PATH:$NVM_DIR/versions/node/v${NODE_VERSION}/bin

RUN if [ ${NPM_REGISTRY} ]; then \
    . ~/.bashrc && npm config set registry ${NPM_REGISTRY} \
;fi

RUN if [ ${INSTALL_NODE} = true ]; then \
    npm i npm@latest -g \
;fi

#####################################
# AWS CLI:
#####################################

USER root

ARG INSTALL_AWSCLI=false
ENV INSTALL_AWSCLI ${INSTALL_AWSCLI}

RUN if [ ${INSTALL_AWSCLI} = true ]; then \
    pip install awscli \
;fi

#####################################
# Check PHP version:
#####################################

ARG PHP_VERSION
ENV PHP_VERSION=${PHP_VERSION}
RUN php -v | head -n 1 | grep -q "PHP 7.2."

#####################################
# Final Touch:
#####################################

# Clean up
USER root
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Set default work directory
WORKDIR ${APP_CODE_PATH_CONTAINER}
