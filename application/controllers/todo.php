<?php
/*
 * Class Todo_Controller provide a basic todo CRUDing REST service
 * 
 */
class Todo_Controller extends Base_Controller {
	/*
	 * set TRUE to define a REST controller
	 */
	public $restful = TRUE;

	/**
	 * GET all todo resources
	 */
	public function get_index() {

		$ext = 'json';
		$header = 'application/json';

		if (Request::accepts('text/xml')) {
			$ext = 'xml';
			$header = 'text/xml';
		}
		$input = Todo::all();
		$todos = array();
		foreach ($input as $todo) {
			$todos[] = $todo->to_array();
		}

		//set headers        
		$response = Response::view('todo_' . $ext, array('todos' => $todos));
		$response->header('Content-Type', $header);
		return $response;
	}

	/**
	 * 
	 * GET an identified resource
	 */
	public function get_show($id) {
		$ext = 'json';
		$header = 'application/json';

		if (Request::accepts('text/xml')) {
			$ext = 'xml';
			$header = 'text/xml';
		}

		$todo = Todo::find($id);
		if ($todo == null) {
			return Response::make('', '404', array('Content-Type' => $header));
		}
		$response = Response::view('todo_' . $ext, array('todo' => $todo));
		$response->header('Content-Type', $header);
	}

	/**
	 * POST (create) a todo resource
	 */
	public function post_create() {
		$ext = 'json';
		$header = 'application/json';

		if (Request::accepts('text/xml')) {
			$ext = 'xml';
			$header = 'text/xml';
		}

		$todo = new Todo;
		$todo->title = Input::get('title');
		$todo->task = Input::get('task');
		$todo->due_date = Input::get('due_date');
		$todo->done = Input::get('done');
		$todo->save();

		return Response::make('', '201',
				array('Content-Type' => $header, 'Location' => 'todos/'
						. $todo->id));
	}

	/*
	 * DELETE a todo resource
	 */
	public function delete_remove($id) {
		$ext = 'json';
		$header = 'application/json';

		if (Request::accepts('text/xml')) {
			$ext = 'xml';
			$header = 'text/xml';
		}

		$todo = Todo::find($id);
		if ($todo == NULL) {
			return Response::make('', '404', array('Content-Type' => $header));
		}
		$todo->delete();
		return Response::make('', '204', array('Content-Type' => $header));
	}

	/*
	 * PUT (update) a todo resource
	 */
	public function put_edit($id) {
		$ext = 'json';
		$header = 'application/json';

		if (Request::accepts('text/xml')) {
			$ext = 'xml';
			$header = 'text/xml';
		}

		$todo = Todo::find($id);
		if ($todo == NULL) {
			Response::status('404');
			Response::send_headers();
			return;
		}

		if (Input::get('title'))
			$todo->title = Input::get('title');
		if (Input::get('task'))
			$todo->task = Input::get('task');
		if (Input::get('due_date'))
			$todo->due_date = Input::get('due_date');
		if (Input::get('done'))
			$todo->done = Input::get('done');
		$todo->save();
		Response::status('200');
		Response::header('Location:', 'todos/' . $todo->id);
		Response::send_headers();

	}

	/*
	 * send allowed methods to client
	 */
	public function get_allowedMethods() {
		return Response::make('', '200',
				array('Allow' => 'GET,PUT,POST,OPTIONS,DELETE'));
	}
}
