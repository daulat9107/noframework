<?php

/**
* Loader configuration files
*/

namespace App\Config\Loaders;

use App\Config\Loader;
use Exception;
class ArrayLoader implements Loader
{
	protected $files;
	public function __construct(array $files)
	{
		$this->files=$files;
	
	}
	public function parse()
	{
		$parsed=[];
		if(empty($this->files)){
			return null;
		}
		foreach ($this->files as $namespace => $path) {
			try {

				$parsed[$namespace]=require $path;
				
			} catch (Exception $e) {
				//
			}
		}

		return $parsed;
	}	
}