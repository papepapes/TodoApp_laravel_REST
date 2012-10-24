[
@foreach ($todos as $todo)
 { 
  'title': {{ $todo->title }},
  'task': {{$todo->task}},
  'due_date': {{$todo->due_date}},
  'status': {{$todo->status}}
 }
@endforeach
]