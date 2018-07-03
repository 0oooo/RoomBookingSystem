<?php

require('session-functions.php');
require('view/view-function.php');
require('model/staff.php');
redirect_if_not_signed_in();
$role = 'staff';
redirect_if_no_access($role);

$staff_list = get_all_staff();



view('List staff', 'list-staff', ['staff_list'=>$staff_list]);