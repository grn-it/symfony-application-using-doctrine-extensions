install:
	docker-compose up -d
	docker-compose exec symfony-web-application composer install
	docker-compose exec symfony-web-application symfony console doctrine:migrations:migrate -n
	docker-compose exec symfony-web-application symfony console app:fixtures:load -n

up:
	@docker-compose up -d
	
down:
	@docker-compose down

symfony:
	@docker-compose exec symfony-web-application bash
