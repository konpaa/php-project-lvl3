start:
	php artisan serve --host 0.0.0.0

setup:
	composer install

log:
	tail -f storage/logs/laravel.log

test:
	php artisan test

deploy:
	git push heroku

lint:
	composer phpcs

lint-fix:
	composer phpcbf


