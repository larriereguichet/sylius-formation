FROM node:stretch-slim

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
    apt-get --no-install-recommends --no-install-suggests --yes --quiet install \
        apt-transport-https \
        bash-completion \
        ca-certificates \
        curl \
        git \
        gnupg \
        imagemagick \
        less \
        make \
        mysql-client \
        nano \
        perceptualdiff \
        procps \
        python \
        ssh-client \
        sudo \
        unzip \
        vim \
        zsh \
        wget && \
    apt-get clean && apt-get --yes --quiet autoremove --purge && \
    rm -rf  /var/lib/apt/lists/* /tmp/* /var/tmp/* \
            /usr/share/doc/* /usr/share/groff/* /usr/share/info/* /us

RUN npm install -g --force yarn

WORKDIR /home/docker/workspace/sylius
