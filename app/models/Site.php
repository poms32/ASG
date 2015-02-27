<?php

class Site extends Eloquent {

	protected $table = 'sites';
	public $timestamps = true;

	public function users()
	{
		return $this->belongsTo('User');
	}

	public function networks()
	{
		return $this->belongsTo('Network');
	}

	public function hosts()
	{
		return $this->belongsTo('Host');
	}

	public function cmss()
	{
		return $this->belongsTo('Cms');
	}

	public function seostates()
	{
		return $this->hasOne('Seostate');
	}

}