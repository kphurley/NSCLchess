<?php

class Announcement extends Eloquent{
	use SortableTrait;
	protected $guarded = array('id');
}