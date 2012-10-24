<?xml version="1.0" encoding="UTF-8"?>
<root>
  @foreach ($todos as $todo)
  <todo>
      <title>{{$todo->title}}</title>
      <task>{{$todo->task}}</task>
      <due_date>{{$todo->due_date}}</due_date>
      <status>{{$todo->status}}</status>
  </todo>
  @endforeach  
</root>
