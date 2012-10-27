# [Laravel](http://laravel.com) - A PHP Framework For Web Artisans

TodoApp for Laravel is a simple implementation of a todo REST service using amazing PHP framework Laravel (http://laravel.com).
[Official Website & Documentation for Laravel](http://laravel.com)

## Feature Overview

- Create a todo resource with HTTP POST method
- Update a todo resource with HTTP PUT method
- List todo resources with HTTP GET method
- Get a todo resource with HTTP GET method
- Delete a todo resource with HTTP DELETE method
- GET supported methods with HTTP GET method (see below for more on this one)

## A Few Examples

### Hello World:

```php
<?php

Route::get('/', function()
{
	return "Hello World!":
});
```

### Passing Data To Views:

```php
<?php

Route::get('user/(:num)', function($id)
{
	$user = DB::table('users')->find($id);

	return View::make('profile')->with('user', $user);
});
```

### Redirecting & Flashing Data To The Session:

```php
<?php

return Redirect::to('profile')->with('message', 'Welcome Back!');
```

```bash
git commit -s -m "this commit will be signed off automatically!"
```

