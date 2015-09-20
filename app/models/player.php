<?php

class Player extends Eloquent {

	use SortableTrait;
	
	//public static $table = 'players'

	protected $guarded = array('id');

	//public static $rules = array(
    //'firstName'=>'required|min:2|unique:players',
    //'lastName'=>'required|min:2|unique:players'
   // );

	
  
}