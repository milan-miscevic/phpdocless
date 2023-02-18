DOCKER=docker-compose -f ./docker/docker-compose.yml
PHP=php80-cli

build: install

cli:
	$(DOCKER) run $(PHP) bash

install:
	$(DOCKER) build
	$(DOCKER) run --rm $(PHP) composer install

phpstan:
	$(DOCKER) run --rm $(PHP) ./vendor/bin/phpstan analyse

test: unit phpstan

unit:
	$(DOCKER) run --rm php80-cli ./vendor/bin/phpunit
	$(DOCKER) run --rm php81-cli ./vendor/bin/phpunit
	$(DOCKER) run --rm $(PHP) ./vendor/bin/phpunit
