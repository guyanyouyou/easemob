<?php
/**
 * @Author: 孤雁幽幽
 * @Date:   2019-12-18 22:26:13
 * @Last Modified by:   孤雁幽幽
 * @Last Modified time: 2019-12-18 23:47:07
 */
require_once '../vendor/autoload.php';
use guyanyouyou\Easemob;

$config = [
    'domain_name' => 'https://a1.easemob.com',  //可选参数
    'client_id' => 'your client_id',
    'client_secret' => 'your client_secret',
    'org_name' => 'your org_name',
    'app_name' => 'your app_name',
];


$ease = new Easemob($config);
$ease->getUser($user_name);
