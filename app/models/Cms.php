<?php

class Cms extends Eloquent {

	protected $table = 'cmss';
	public $timestamps = true;

	public function sites()
	{
		return $this->hasMany('Site');
	}

}