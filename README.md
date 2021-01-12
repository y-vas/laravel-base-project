#### run this commands before starting

```
composer update
docker-compose up
```

#### change the mysql adress from this container on the .env variables -->
```
sudo docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' mysql_hl
```
