<?php

class PEIP_Facebook_Context_Plugin
	extends PEIP_ABS_Context_Plugin {
	
	protected static $builders = array(
		'facebook_service'=>'createService',
		'facebook_client'=>'createClient'	
	);
	
	public function createService($config){
		if($config['key'] && $config['secret']){
			$config['class'] = 'Facebook';
			return $this->context->buildAndModify($config, array(
				(string)$config['key'],	
				(string)$config['secret']
			));
		}
	}
		
	public function createClient($config){
		$serviceName = (string)$config['service'];
		if($service = $this->context->getService($serviceName)){ 
			$config['class'] = NULL;
			$config['ref_property'] = 'api_client';
			$config['ref'] = $serviceName;
			return $this->context->buildAndModify($config, array());
		}
	}	
						
}