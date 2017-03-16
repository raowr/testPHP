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
