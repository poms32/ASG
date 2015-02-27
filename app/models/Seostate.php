<?php

class Seostate extends Eloquent {

	protected $table = 'seostates';
	public $timestamps = true;

	public function sites()
	{
		return $this->belongsToMany('Site');
	}

}