<?php

class Player extends Eloquent {

	//public static $table = 'players';

	use SortableTrait;

	protected $guarded = array('id');

	//public static $rules = array(
    //'firstName'=>'required|min:2|unique:players',
    //'lastName'=>'required|min:2|unique:players'
   // );

	
  
}