<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// Admin seed
		User::create(array(
				'email' => 'romain.pommerolle@gmail.com',
				'password' => Hash::make('sLCFJ3?'),
				'internetbs_api_key' => 'X3V7H6Y9L1D7A0A6M2L3',
				'internetbs_api_pass' => 'CruapWenk3',
				'pgid' => '6934',
				'payglad_key' => '1ad8ef7226959f742be6fcb382fff8fe',
				'piwik_key' => 'd5f692b1e6137a76b401fc519f667bb7',
				'is_admin' => 1,
				'firstname' => 'Romain'
			));
	}
}