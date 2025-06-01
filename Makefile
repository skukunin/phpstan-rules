tests\:run:
	./vendor/bin/phpunit

tests\:coverage:
	XDEBUG_MODE=coverage ./vendor/bin/phpunit --coverage-html tests/@coverage