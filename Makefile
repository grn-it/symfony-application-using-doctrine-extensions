install:
	docker-compose up -d
	docker-compose exec symfony-web-application composer install

up:
	@docker-compose up -d
	
down:
	@docker-compose down

symfony:
	@docker-compose exec symfony-web-application bash
