<?php

class Domain extends Eloquent {

	protected $table = 'domains';
	public $timestamps = true;

	public function users()
	{
		return $this->belongsTo('User');
	}

}