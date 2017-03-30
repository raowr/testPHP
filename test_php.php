<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$mid=array();
$mid['member_id']=2;
$sql = "SELECT * FROM `vmc_commission_orderlog_achieve` WHERE `achieve_fund` > 0 AND `member_id` = $mid[member_id] ";
		echo $sql;
		
		
		
$db['cashlog'] = array(
    'columns' => array(
		'cashlog_id' => array(
            'type' => 'number',
            'required' => true,
            'label' => 'ID',
            'pkey' => true,
            'extra' => 'auto_increment',
            'in_list' => true,
        ),
		'cash_id' => array(
            'type' => 'number',
            'required' => true,
            'label' => '提现ID',
            'in_list' => true,
        ),
        'orderlog_id' => array(
            'type' => 'number',
            'required' => true,
            'label' => '订单ID',
            'comment' => '订单ID',
        ),
        'order_id' => array(
            'type' => 'bigint unsigned',
            'required' => true,
            'label' => '订单号',
            'comment' => '订单ID',
            'in_list' => true,
            'default_in_list' => true,
            'searchtype' => 'has',
        ),
        'from_id' => array(
            'type' => 'number',
            'required' => true,
            'label' => '订单来源ID',
            'comment' => '订单来源ID',
            'in_list' => true,
            'default_in_list' => true,
        ),
        'order_fund' => array(
            'type' => 'money',
            'required' => true,
            'label' => '佣金',
            'comment' => '产生分佣金额',
            'in_list' => true,
            'default_in_list' => true,
        ),
        'createtime' => array(
            'type' => 'time',
            'required' => true,
            'label' => '生成时间',
            'comment' => '生成时间',
            'in_list' => true,
            'default_in_list' => true,
        ),
		'used' => array(
            'type' => 'money',
            'required' => true,
            'label' => '佣金',
            'comment' => '已经核销的分佣金额',
            'in_list' => true,
            'default_in_list' => true,
        ),
		'unused' => array(
            'type' => 'money',
            'required' => true,
            'label' => '佣金',
            'comment' => '未核销的分佣金额',
            'in_list' => true,
            'default_in_list' => true,
        ),
		'settle_status' => array(
            'type' =>
                array(
                    '0' => ('未核销'),
                    '1' => ('已核销'),
                    '2' => ('部分核销'),
                ),
            'required' => true,
            'default' => '0',
            'label' => '结算状态',
            'comment' => '结算状态',
            'in_list' => true,
            'default_in_list' => true,
            'filtertype' => 'normal',
            'filterdefault' => true,
        ),
    ),
    'comment' => '订单分佣核销提现记录表',
);
