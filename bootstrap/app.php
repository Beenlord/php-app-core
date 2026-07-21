<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure()
	->withRouting(
		api: routes_path('api.php'),
		commands: routes_path('console.php'),
		then: function () {
			Route::middleware('web')->group(function () {
				Route::fallback(function () {
					if (!file_exists(public_path('app/index.html'))) {
						return 'Frontend is not avaliable!';
					}
					return response()->file(public_path('app/index.html'));
				});
			});
		},
	)
	->withMiddleware(function (Middleware $middleware) {
		$middleware->web(append: []);
		$middleware->alias([]);
	})
	->withCommands([
	])
	->withExceptions(function (Exceptions $exceptions) {
	})
	->create();
