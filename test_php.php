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