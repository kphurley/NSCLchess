<?php

class Player extends Eloquent {

	//public static $table = 'players';

	protected $guarded = array('id');

	public static $rules = array(
    'name'=>'required|min:2|unique:players',
    );
}