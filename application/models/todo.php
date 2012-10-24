<?php


/**
* Represent the result that we will give to request
*
**/
class Todo extends Eloquent{
    public static $hidden = array('original', 'relationships', 'exists', 'includes');
    public static $timestamps = true;

}
