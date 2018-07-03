<?php
require('model/event-log.php');
require('view/view-function.php');
require('session-functions.php');
redirect_if_not_signed_in();
$role = 'admin';
redirect_if_no_access($role);

$event = display_event_log();



view('Log events', 'log-display', ['event'=>$event]);