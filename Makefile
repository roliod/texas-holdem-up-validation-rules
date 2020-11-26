default: help

## Display this message
help:
	@echo "Usage: make <target>"
	@echo "Available targets:"
	@awk '/^##/ {c=$$0}; /^[a-zA-Z_-]+:/ {gsub(":$$", "", $$1); gsub(/^#+/, "", c); printf "\033[36m%-30s\033[0m %s\n", $$1, c}; /^([^#]|$$)/ {c=""}' $(MAKEFILE_LIST)

## Install all dependencies
install:
	composer install --prefer-dist -n -v -o

## Update all dependencies
update:
	composer update --prefer-dist

## Run all unit tests
unit-test:
	./vendor/bin/phpunit --testsuite=Unit

## Run all tests
test: unit-test

## Run lint
lint:
	find src tests -type f -iname '*php' -exec php -l {} \;

## Run static code analysis
analyse-code: lint
	./vendor/bin/psalm

## Run all analysis tasks
delivery: analyse-code test
