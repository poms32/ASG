<?php

class KeywordController extends Controller {

	static function addKeywords($id,$kws){
		if(!array_key_exists('prim_kw', $kws) || !array_key_exists('sec_kw', $kws) || !array_key_exists('oth_kw', $kws)){
			return false;
		}
		$redis = Redis::connection();
	    for ($i = 0;$i < count($kws['prim_kw']); $i++){
	        $redis->set("$id:prim_kw:$i", $kws['prim_kw'][$i]);
	    }
	    for ($i = 0;$i < count($kws['sec_kw']); $i++){
	        $redis->set("$id:sec_kw:$i", $kws['sec_kw'][$i]);
	    }
	    for ($i = 0;$i < count($kws['oth_kw']); $i++){
	        $redis->set("$id:oth_kw:$i", $kws['oth_kw'][$i]);
	    }
		return true;
	}

}