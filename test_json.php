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
/**
* 
*/
class test_excel
{
	
	function f_excel()
	{
		# code...
		header('Content-Type:application/vnd.ms-excel');
		header('Content-Disposition:attachment;filename=demo.xls');
		header('Pragma:no-cache');
		header('Expires:0');
		$title = array('编号','姓名','性别','年龄','身高','体重');
		$data=array(
			array(1,'张山','男',"22",183,72),
			array(2,'李四','男',"18",170,50),
			array(3,'王五','男',"14",178,68),
			array(4,'赵六','男',"34",163,48)
		);
		echo iconv('utf-8','gbk',implode("\t",$title)),"\n";
		foreach ($data as $value) {
			echo iconv('utf-8','gbk',implode("\t",$value)),"\n";
		}
	}
}
$out_excel = new test_excel();
$out_excel->f_excel();

