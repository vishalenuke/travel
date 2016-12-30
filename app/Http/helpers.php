<?php
function arrayFromObject($object,$input){
		$array=array();
		foreach ($object->fillable as $key => $value) {
      			$array[$value]=isset($input[$value])?$input[$value]:'';
  		}
  		return $array;
	}
	function imageUrl($value='',$keys=''){
		$url=url('/img/list_user_icon.png');
		if(!(empty($value) && empty($keys))){
			if(isset($keys['image']) && isset($value[$keys['image']]) && !empty($value[$keys['image']]))
				$url=url('/images/'.$value[$keys['image']]);
		}
		return $url;
	}
	function headerImageUrl($url=''){
		$url=empty($url)?url('/img/list_user_icon.png'):url('/images/'.$url);
		return $url;
	}

?>