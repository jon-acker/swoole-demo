# swoole-demo
Demo swoole extension with Symfony app

`composer install`

`docker-compose up -d`

## Start server (swoole)
`docker-compose exec php php main.php`

## Access
Via nginx: http://localhost:8080/healthcheck

To benchmark: `ab -c 100 -n 100 http://127.0.0.1:8080/healthcheck`

Via swoole: http://localhost:9502/healthcheck

To benchmark: `ab -c 100 -n 100 http://127.0.0.1:9502/healthcheck`
