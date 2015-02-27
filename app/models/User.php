<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $hidden = array('password', 'remember_token');
	protected $table = 'users';
	public $timestamps = true;

	public function hosts()
	{
		return $this->hasMany('Host');
	}

	public function networks()
	{
		return $this->hasMany('Network');
	}

	public function sites()
	{
		return $this->hasMany('Site');
	}

	public function domains()
	{
		return $this->hasMany('Domain');
	}

}