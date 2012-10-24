<?php

class Create_Todos3 {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::drop('todos');
	    Schema::create('todos', function($table){
            $table->increments('id');
            $table->string('title');
            $table->text('task');
            $table->timestamp('due_date')->nullable();
            $table->boolean('status')->default(false);
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