<?php 


class ZipperClass{
	public $_files = array(),
			$_zip;

	public function __construct(){
		$this->_zip = new ZipArchive;
	}

	public function add_file($file){
		if(file_exists($file)) $this->_files[] = $file;
		else die($file." Doesn't Exist...");
	}

	public function add_files(Array $files){
		foreach($files as $file){
			if(file_exists($file)) $this->_files[] = $file;
			else die($file." Doesn't Exist...");
		}
	}

	public function add_dir($dir){
		$array = $this->find_all_files($dir);
		$this->_files = array_merge($this->_files,$array);
		// echo "<pre>".print_r($array,true)."</pre>";
	}

	private function find_all_files($dir){
	   $root = scandir($dir);
	   foreach($root as $value){
	      if($value == '.' || $value == '..') {continue;}
	      if(is_file("$dir/$value")){
	         $result[]= "$dir/$value"; 
	         continue;
	      }
	      foreach($this->find_all_files("$dir/$value") as $value){
	         $result[]= $value;
	      }
	   }
	   return (isset($result)) ? $result : [] ;
	}

	public function store($location = null){
		if($location && count($this->_files)){
			if($this->_zip->open($location,file_exists($location) ? ZipArchive::OVERWRITE : ZipArchive::CREATE)){
				foreach($this->_files as $file){
                    $zipped_file_name = $file; //ziped name is the same as old name
                    $this->_zip->addFile($file,$zipped_file_name);
                }
                $this->_zip->close();
			}
		}
	}



}