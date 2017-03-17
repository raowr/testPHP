<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//测试连接git

// +----------------------------------------------------------------------
// | VMCSHOP [V M-Commerce Shop]
// +----------------------------------------------------------------------
// | Copyright (c) vmcshop.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.vmcshop.com/licensed)
// +----------------------------------------------------------------------
// | Author: Shanghai ChenShang Software Technology Co., Ltd.
// +----------------------------------------------------------------------
class commission_ctl_admin_detail extends desktop_controller
{

    public function index()
    {
        if ($_POST) {
            $uname = $_POST['uname'];
            $mid = app::get('pam')->model('members')->getRow('member_id', array('login_account' => trim($uname)));
            if (!$mid) {
                $this->_failure('用户名：' . $uname . '错误！');
            }
//            $orderlog_achieve = app::get('commission')->model('orderlog_achieve')->getList('*', array('member_id' => $mid['member_id']));
//            $orderlog_id = array_keys(utils::array_change_key($orderlog_achieve, 'orderlog_id'));
//            $orderlog = app::get('commission')->model('orderlog')->getList('*', array('orderlog_id' => $orderlog_id));
            $db = vmc::database();
            $sql = 'SELECT b.* FROM `vmc_commission_orderlog_achieve` a LEFT JOIN `vmc_commission_orderlog` b  ON a.`orderlog_id` = b.`orderlog_id` WHERE a.`member_id` = ' . $mid['member_id'];
            $orderlog = $db->select($sql);
            

            if (!$orderlog) {
                $this->_failure('用户名：' . $uname . '查无分佣数据！');
            }
            foreach ($orderlog as $k => $v) {
                $orderlog_items = app::get('commission')->model('orderlog_items')->getList('product_id ,product_fund', array('orderlog_id' => $v['orderlog_id']));
                foreach ($orderlog_items as $k1 => $v1) {
                    $product = app::get('b2c')->model('products')->getRow('product_id , bn ,name', array('product_id' => $v1['product_id']));
                    $orderlog_items[$k1]['product_name'] = $product['name'];
                    $orderlog_items[$k1]['product_bn'] = $product['bn'];
                }
                $orderlog_achieve = app::get('commission')->model('orderlog_achieve')->getList('member_id ,achieve_fund,parent_type', array('orderlog_id' => $v['orderlog_id']));
                foreach ($orderlog_achieve as $k2 => $v2) {
                    $orderlog_achieve[$k2]['levelname'] = vmc::singleton('commission_service_member')->get_member_lv_name($v2['parent_type']);
                    $orderlog_achieve[$k2]['uname'] = vmc::singleton('b2c_user_object')->get_member_name(null, $v2['member_id']);
                }
                $orderlog[$k]['orderlog_items'] = $orderlog_items;
                $orderlog[$k]['orderlog_achieve'] = $orderlog_achieve;
                $orderlog[$k]['from_name'] = vmc::singleton('b2c_user_object')->get_member_name(null, $v['from_id']);
                $orderlog[$k]['order_detail'] = app::get('b2c')->model('orders')->getRow('createtime,last_modified,order_total,status', array('order_id' => $v['order_id']));
                $orderlog[$k]['order_detail']['createtime'] = date("Y-m-d H:i", $orderlog[$k]['order_detail']['createtime']);
                $orderlog[$k]['order_detail']['last_modified'] = date("Y-m-d H:i", $orderlog[$k]['order_detail']['last_modified']);
                if ($orderlog[$k]['order_detail']['status'] == 'dead') {
                    unset($orderlog[$k]);
                }
            }
            //print_r($orderlog);return false;
            $this->_success($orderlog);
        }

        $this->page('admin/detail.html');
    }

    private function _success($data)
    {
        echo json_encode(array(
            'result' => 'success',
            'data' => $data,
        ));
        exit;
    }

    private function _failure($msg)
    {
        echo json_encode(array(
            'result' => 'failure',
            'data' => [],
            'msg' => $msg,
        ));
        exit;
    }


}



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
