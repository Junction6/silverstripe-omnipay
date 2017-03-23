<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class GateWayInfoConfig extends Object {
	protected $config = array();
	
	public function get($gateway){
		return $this->config[$gateway];
	}
	
	public function __construct() {
		parent::__construct();
		$this->config['Pin']= array(
		    'parameters' => array(
			'testMode' => true,
			'secretKey' => 'acuITdqTdhe_Z_Jo4t-1hg',
			'description'=> 'who knows',
			
		    ),
		    'required_fields' => array(
			'billingAddress1',
			'city',
			'country',
			'email',
			),
		    'is_offsite'=>true
		);
	}
}

class GatewayFieldsFactoryConfig extends Object {
	protected $config;	
	public function get($val){
		return $this->config[$val];
	}
	
	public function __construct() {
		parent::__construct();
		$this->config = array();
	}
}

class PaymentMathConfig extends Object {
	protected $config;	
	public function get($val){
		return $this->config[$val];
	}
	
	public function __construct() {
		parent::__construct();
		$this->config = array('precision'=> 2);
	}
}

class ServiceFactoryConfig extends Object {
	protected $config;
	
	public function get($val){
		return $this->config[$val];
	}
	
	public function __construct() {
		parent::__construct();
		$this->config['services'] = array(
			'authorize' => '\SilverStripe\Omnipay\Service\AuthorizeService',
			'createcard' => '\SilverStripe\Omnipay\Service\CreateCardService',
			'purchase' => '\SilverStripe\Omnipay\Service\PurchaseService',
			'refund' => '\SilverStripe\Omnipay\Service\RefundService',
			'capture' => '\SilverStripe\Omnipay\Service\CaptureService',
			'void' => '\SilverStripe\Omnipay\Service\VoidService'
		);
	}
}
