<?php 


require_once("ZipperClass.php");

$zipper = new ZipperClass;

//you can add files as strings:-
// $zipper->add_file('files/file_four.mp4');

//or you can add files as array:-
// $zipper->add_files(['files/file_one.txt','files/file_two.txt','files/file_three.txt']);

//you can add directory:-
$zipper->add_dir("files");

//finally you can store files like this:-
$zipper->store('output_files/'.time().'-zipped.zip');