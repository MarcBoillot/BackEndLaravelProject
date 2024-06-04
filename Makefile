build:
	sudo docker compose up --force-recreate
clear:
	sudo docker system prune
stop:
	sudo docker compose stop _nginx
bash:
	sudo docker compose exec laravel_nginx
