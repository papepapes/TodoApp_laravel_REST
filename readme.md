# Todo REST service with Laravel

TodoApp for Laravel is a simple implementation of a todo REST service using amazing PHP framework [Laravel] (http://laravel.com).

## Feature Overview

- Create a todo resource with HTTP POST method
- Update a todo resource with HTTP PUT method
- List todo resources with HTTP GET method
- Get a todo resource with HTTP GET method
- Delete a todo resource with HTTP DELETE method
- GET supported methods with HTTP GET method (see below for more on this one)

## Service Specification

### The Resource

The resource for the service is a todo task described by:
- a title attribute
- a task attribute
- a due_date attribute
- a status attribute

The endpoint to access this resource is /todos at the server. Several HTTP methods are used for access.
### Methods
In order to respect design principles of our pragmatic REST service, these HTTP methods aare used:
- GET at /todos to access todo list
- GET at /todos/{id} to access todo identified with {id}
- POST at /todos to create a todo resource
- PUT at /todos/{id} to update resource identified with {id}
- DELETE at /todos/{id} to remove a resource identified with {id}
- OPTIONS at /todos in order to obtain supported HTTP Methods : GET,POST,PUT,DELETE,OPTIONS



### HTTP Status code
Theses status codes are used along with the service :
- 200 for GET /todos, GET /todos{id}, OPTIONS when everything is OK
- 404 for GET /todos/{id}, POST /todos, PUT /todos/{id}, DELETE /todos/{id} when there is no resource identified with {id} or no data is posted
- 201 for POST /todos when new resource is created
- 204 for DELETE /todos/{id} when the resource is deleted and no content is retourned

### State representation for todo
The format used to represent the state of the resource by the service depends on the HTTP Allow header in the client request. Two format 
are used in the service : 
- JSON : Allow: application/json
- XML : Allow: text/xml

In response to client request, the service uses HTTP header Content-Type to specify resource representation format.

## Dev notes

[Laravel] (http://laravel.com) is great for the creation of a pragmatic simple REST service. But if you want to support more HTTP methods 
in a more advanced project, you may encounter some problem with the Router class as it does not support (not yet) HTTP methods other than v
GET, PUT, POST, and DELETE.
In order to support the OPTIONS method, we used then GET at /todos/methods. 


```php
<php?

Route::controller(Controller::detect());
Route::get('todos/(:any)','todo@show');
Route::get('todos','todo@index');
Route::post('todos','todo@create');
Route::put('todos/(:any)','todo@edit');
Route::delete('todos/(:any)','todo@remove');
Route::get('todos/methods','todo@allowedMethods');

?>
```
