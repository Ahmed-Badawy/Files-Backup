<?php

require_once("ZipperClass.php");
$zipper = new ZipperClass();




$dir = __dir__;
$output = strstr ($dir,"public_html",true);
$search_dir = $output."public_html";

//die($search_dir);

$post = $_POST;
//echo "<pre>"; var_export($post);die;
foreach($post['backup_dirs'] as $cur_dir) $zipper->add_dir($search_dir."/".$cur_dir);



//you can add files as strings:-
// $zipper->add_file('files/file_four.mp4');

//or you can add files as array:-
// $zipper->add_files(['files/file_one.txt','files/file_two.txt','files/file_three.txt']);

//you can add directory:-
//$zipper->add_dir($search_dir);

echo "<pre>"; var_export($zipper->_files);
echo "<hr>"; var_export($dir.'/output_files/'.time().'-zipped.zip');
//die;


//finally you can store files like this:-
$zipper->store($dir.'/output_files/'.time().'-zipped.zip');


echo "\n Backup Done";

