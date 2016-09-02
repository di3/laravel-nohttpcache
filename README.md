# laravel-nohttpcache
laravel NoHttpCache Middleware

usable for routeMiddleware *bootstrap/app.php*
```php
$app->routeMiddleware([
	'noHttpCache' => \App\Http\Middleware\NoHttpCacheMiddleware::class,
]);
```

add middleware to your routes *app/Http/routes.php*
```php
$app->get('api/v1', ['middleware' => ['noHttpCache'],function () {
	return response()->json(array(
	  'status'=>'ok',
	  'message'=>'Service is operating normally'
	));
}]);
```
