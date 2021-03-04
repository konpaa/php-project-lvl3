start:
	php artisan serve --host 0.0.0.0

setup:
	composer install
	cp -n .env.example .env.local || true
	php artisan key:gen --ansi
	php artisan key:generate --env=testing
	touch database/database.sqlite || true
	php artisan migrate
	npm install

watch:
	npm run watch

migrate:
	php artisan migrate

console:
	php artisan tinker

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

test-coverage:
	composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml
