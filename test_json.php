<?php

// $cars=array(
//   $a=array("name"=>"Vol1vo0","age"=>22,array("name"=>"BMW","age"=>15,13)),
//   $b=array("name"=>"BMW","age"=>15,13),
//   $c=array("name"=>"Saab","age"=>5,2),
//   $d=array("name"=>"Land Rover","age"=>17,15)
// );
// echo json_encode($cars);
// //var_dump($cars);
// //print_r($cars);

header('Content-Type:application/vnd.ms-excel');
header('Content-Disposition:attachment;filename=demo.xls');
header('Pragma:no-cache');
header('Expires:0');
$title = array('编号','姓名','性别','年龄','身高','体重');
$data=array(
		aray(1,'张山','男')
		aray(1,'张山','男')
		aray(1,'张山','男')
		aray(1,'张山','男')
		aray(1,'张山','男')
);
echo iconv('utf-8','gbk',implode("\t",$title)),"\n";
foreach ($data as $value) {
	# code...
	echo iconv('utf-8','gbk',implode("\t",$value)),"\n";
}

