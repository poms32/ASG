<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before' => 'auth'), function(){
	Route::get('/', function(){
		return Redirect::to('dashboard');
	});

Route::get('dashboard', function(){
		return View::make('dashboard',array('pageTitle' => "Dashboard"));
	});

Route::get('hosting', function(){
		$table = Host::all();
		return View::make('hosting', array('pageTitle' => "Hosting", 'hosts' => $table));
	});
	
Route::put('hosting', function(){
		$host = new Host(Input::all());
		$host->user_id = Auth::user()->id;
		if($host->save()){
			return Response::json(array("result" => "ok", "data" => Host::find($host->id)->toJson()));
		}else{
			return Response::json(array("result" => "nok"), 403);
		}
	});

Route::delete('hosting', function(){
		$hosts = Input::all();
		foreach($hosts as $item => $host){
			$h = Host::find($hosts[$item]);
			$h->delete();
			$ids[] = $hosts[$item];
		}
		return Response::json(array("result" => 'ok', 'ids' => $ids));
	});
	
Route::get('network', function(){
		$table = Network::all();
		return View::make('network', array('pageTitle' => "Network", 'networks' => $table));		
	});

Route::put('network', function(){
		$kw = Input::only('prim_kw','sec_kw','oth_kw');
		foreach($kw as &$k){
			$k = explode("\r\n", $k); 
		}
		$network = new Network(Input::only('name'));
		$network->user_id = Auth::user()->id;
		if($network->save()){
			$savekw = KeywordController::addKeywords($network->id,$kw);
			return Response::json(array(
										"result" => "ok",
										"data" => json_encode(array(
														Network::find($network->id)->toJson(),
														Site::where('network_id', $network->id)->count()
														))
										)
									);
		}else{
			return Response::json(array("result" => "nok"), 403);
		}
	});
	
Route::delete('network', function(){
		$networks = Input::all();
		foreach($networks as $item => $network){
			$n = Network::find($networks[$item]);
			$n->delete();
			$ids[] = $networks[$item];
		}
		return Response::json(array("result" => 'ok', 'ids' => $ids));
	});

});


Route::get('login', function(){
	return View::make('login', array('pageTitle' => "Page de Login"));
});
Route::post('login', function(){
	if(Auth::attempt(Input::only('email', 'password'))){
		return Redirect::intended('/');
	}else{
		return Redirect::back()
			->withInput()
			->with('error', "Mauvaise informations");
	}
});

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/');
});