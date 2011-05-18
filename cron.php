<?php
$_SERVER['PATH_INFO'] = '/hook/outbound/queue';
chdir(dirname(dirname(dirname(__FILE__))));
require('index.php');
