<?php

class Network extends Eloquent {

	protected $table = 'networks';
	protected $fillable = array('name');
	public $timestamps = true;

	public function sites()
	{
		return $this->hasMany('Site');
	}

}