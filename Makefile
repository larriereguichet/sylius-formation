.PHONY: install up down php.zsh js.bash

install:
	docker-compose build
	docker-compose up -d
	docker-compose exec php composer install
	docker-compose exec php bin/console sylius:install -n
	docker-compose run --rm js yarn install
	docker-compose run --rm js yarn run encore dev
	docker-compose stop

up:
	docker-compose up -d

down:
	docker-compose down

php.zsh:
	docker-compose exec php zsh

js.bash:
	docker-compose exec js bash

js.build:
	docker-compose run --rm js yarn run encore dev
