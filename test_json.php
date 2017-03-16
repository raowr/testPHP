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



Array
(
    [0] => Array
        (
            [orderlog_id] => 326
            [order_id] => 4614481983230
            [from_id] => 24404
            [order_fund] => 200.000
            [settle_status] => 1
            [createtime] => 1488178135
            [orderlog_items] => Array
                (
                    [0] => Array
                        (
                            [product_id] => 1208
                            [product_fund] => 200.000
                            [product_name] => 乐华 天使之国 阿莫嘉华 葡萄酒系列 5款产品任选3款组合
                            [product_bn] => mmm0001
                        )

                )

            [orderlog_achieve] => Array
                (
                    [0] => Array
                        (
                            [member_id] => 24404
                            [achieve_fund] => 0.000
                            [parent_type] => lv0
                            [levelname] => 注册会员
                            [uname] => yy0001
                        )

                    [1] => Array
                        (
                            [member_id] => 6644
                            [achieve_fund] => 200.000
                            [parent_type] => lv3
                            [levelname] => 钻闪
                            [uname] => rtrtrt
                        )

                )

            [from_name] => yy0001
            [order_detail] => Array
                (
                    [createtime] => 2017-02-27 14:48
                    [last_modified] => 2017-03-02 16:35
                    [order_total] => 688.000
                    [status] => finish
                )

        )

    [1] => Array
        (
            [orderlog_id] => 327
            [order_id] => 4614504148912
            [from_id] => 24404
            [order_fund] => 200.000
            [settle_status] => 0
            [createtime] => 1488178261
            [orderlog_items] => Array
                (
                    [0] => Array
                        (
                            [product_id] => 1208
                            [product_fund] => 200.000
                            [product_name] => 乐华 天使之国 阿莫嘉华 葡萄酒系列 5款产品任选3款组合
                            [product_bn] => mmm0001
                        )

                )

            [orderlog_achieve] => Array
                (
                    [0] => Array
                        (
                            [member_id] => 24404
                            [achieve_fund] => 0.000
                            [parent_type] => lv0
                            [levelname] => 注册会员
                            [uname] => yy0001
                        )

                    [1] => Array
                        (
                            [member_id] => 6644
                            [achieve_fund] => 200.000
                            [parent_type] => lv3
                            [levelname] => 钻闪
                            [uname] => rtrtrt
                        )

                )

            [from_name] => yy0001
            [order_detail] => Array
                (
                    [createtime] => 2017-02-27 14:50
                    [last_modified] => 2017-02-27 14:51
                    [order_total] => 688.000
                    [status] => active
                )

        )

    [2] => Array
        (
            [orderlog_id] => 333
            [order_id] => 2717100059533
            [from_id] => 24404
            [order_fund] => 50.000
            [settle_status] => 0
            [createtime] => 1488878212
            [orderlog_items] => Array
                (
                    [0] => Array
                        (
                            [product_id] => 1208
                            [product_fund] => 50.000
                            [product_name] => 乐华 天使之国 阿莫嘉华 葡萄酒系列 5款产品任选3款组合
                            [product_bn] => mmm0001
                        )

                )

            [orderlog_achieve] => Array
                (
                    [0] => Array
                        (
                            [member_id] => 24404
                            [achieve_fund] => 50.000
                            [parent_type] => lv2
                            [levelname] => 金闪
                            [uname] => yy0001
                        )

                    [1] => Array
                        (
                            [member_id] => 6644
                            [achieve_fund] => 0.000
                            [parent_type] => lv3
                            [levelname] => 钻闪
                            [uname] => rtrtrt
                        )

                )

            [from_name] => yy0001
            [order_detail] => Array
                (
                    [createtime] => 2017-03-07 17:09
                    [last_modified] => 2017-03-07 17:17
                    [order_total] => 688.000
                    [status] => active
                )

        )

    [3] => Array
        (
            [orderlog_id] => 334
            [order_id] => 2717272986239
            [from_id] => 24404
            [order_fund] => 14.000
            [settle_status] => 0
            [createtime] => 1488878913
            [orderlog_items] => Array
                (
                    [0] => Array
                        (
                            [product_id] => 1178
                            [product_fund] => 14.000
                            [product_name] => 自然堂CHCEDO 纯粹滋润冰肌水 清爽型 160ml 保湿补水
                            [product_bn] => 00004153-0
                        )

                )

            [orderlog_achieve] => Array
                (
                    [0] => Array
                        (
                            [member_id] => 24404
                            [achieve_fund] => 12.000
                            [parent_type] => lv2
                            [levelname] => 金闪
                            [uname] => yy0001
                        )

                    [1] => Array
                        (
                            [member_id] => 6644
                            [achieve_fund] => 2.000
                            [parent_type] => lv3
                            [levelname] => 钻闪
                            [uname] => rtrtrt
                        )

                )

            [from_name] => yy0001
            [order_detail] => Array
                (
                    [createtime] => 2017-03-07 17:27
                    [last_modified] => 2017-03-07 17:28
                    [order_total] => 88.000
                    [status] => active
                )

        )

    [4] => Array
        (
            [orderlog_id] => 335
            [order_id] => 2717373211848
            [from_id] => 24404
            [order_fund] => 17.000
            [settle_status] => 1
            [createtime] => 1488879511
            [orderlog_items] => Array
                (
                    [0] => Array
                        (
                            [product_id] => 1176
                            [product_fund] => 17.000
                            [product_name] => 资生堂 SHISEIDO安热沙专业防晒卸妆油 120ml 防晒产品
                            [product_bn] => 00000362
                        )

                )

            [orderlog_achieve] => Array
                (
                    [0] => Array
                        (
                            [member_id] => 24404
                            [achieve_fund] => 15.000
                            [parent_type] => lv2
                            [levelname] => 金闪
                            [uname] => yy0001
                        )

                    [1] => Array
                        (
                            [member_id] => 6644
                            [achieve_fund] => 2.000
                            [parent_type] => lv3
                            [levelname] => 钻闪
                            [uname] => rtrtrt
                        )

                )

            [from_name] => yy0001
            [order_detail] => Array
                (
                    [createtime] => 2017-03-07 17:37
                    [last_modified] => 2017-03-09 16:57
                    [order_total] => 160.000
                    [status] => finish
                )

        )

)

 
    