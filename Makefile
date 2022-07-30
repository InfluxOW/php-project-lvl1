install:
	composer install
lint:
	composer exec --verbose phpcs

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 src

analyse:
	composer exec --verbose phpstan
