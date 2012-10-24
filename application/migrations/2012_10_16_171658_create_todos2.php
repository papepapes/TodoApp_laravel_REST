<?php

class Create_Todos2 {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::create('todos', function($table){
            $table->increments('id');
            $table->string('title');
            $table->text('task');
            $table->timestamp('due_date')->nullable();
            $table->boolean('done')->default(false);
            $table->timestamps();
        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('todos');
	}

}