<?php

class Host extends Eloquent {

	protected $table = 'hosts';
	protected $fillable = array('name','user_id', 'ftp_adress', 'ftp_username', 'ftp_password', 'nameserver_1', 'nameserver_2');
	public $timestamps = true;

	public function users()
	{
		return $this->belongsTo('User');
	}

	public function sites()
	{
		return $this->hasMany('Site');
	}

}