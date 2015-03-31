<?php

class Team extends Eloquent {

	use SortableTrait;

	protected $guarded = array('id','school', 'division');
} 