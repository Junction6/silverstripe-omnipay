<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ .'/code/include_omnipay.php';

Object::add_extension('FormField', 'PinFormExtension');

//require_once __DIR__ . '/code/GatewayInfo.php';
//function __autoload($class_name) {
//    require_once('code/'.$class_name.'.php');
//}