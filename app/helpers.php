<?php
if(!function_exists('base_path')){
	function base_path($path = ''){
		return __DIR__.'/..//'.($path ? DIRECTORY_SEPARATOR . $path:$path);
	}
}


if(!function_exists('dirToArray')){
	function dirToArray($dir) { 
	   $result = array(); 

	   $cdir = scandir($dir); 
	   foreach ($cdir as $key => $value) 
	   { 
	      if (!in_array($value,array(".",".."))) 
	      { 
	         if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
	         { 
	            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
	         } 
	         else 
	         { 
	         	$namespace=explode('.',$value);
	            $result[$namespace[0]] = $dir.DIRECTORY_SEPARATOR.$value; 
	         } 
	      } 
	   } 
	   
	   return $result; 
	} 
}