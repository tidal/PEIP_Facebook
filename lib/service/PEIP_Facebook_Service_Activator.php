<?php

/*
 * This file is part of the PEIP_Facebook package.
 * (c) 2010 Timo Michna <timomichna/yahoo.de>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * PEIP_Facebook_Service_Activator 
 *
 * @author Timo Michna <timomichna/yahoo.de>
 * @package PEIP_Facebook  
 * @subpackage service 
 * @extends PEIP_ABS_Service_Activator
 * @implements PEIP_INF_Connectable, PEIP_INF_Subscribable_Channel, PEIP_INF_Channel, PEIP_INF_Handler, PEIP_INF_Message_Builder
 */

class PEIP_Facebook_Service_Activator 
	extends PEIP_Splitting_Service_Activator {

	protected 
		$fbClient;	
		
    /**
     * @access public
     * @param $serviceCallable 
     * @param $inputChannel 
     * @param $outputChannel 
     * @return 
     */
    public function __construct(FacebookRestClient $facebookRestClient, PEIP_INF_Channel $inputChannel, PEIP_INF_Channel $outputChannel = NULL){
        $this->fbClient = $facebookRestClient;
    	$this->serviceCallable = array($this->fbClient, 'call_method');
        $this->setInputChannel($inputChannel);
        if(is_object($outputChannel)){
            $this->setOutputChannel($outputChannel);    
        }   
    } 

    protected function setSessionId($message){
        if($message->getHeader('SESSION_ID')){ 
        	$this->fbClient->session_key = $message->getHeader('SESSION_ID');
        	return true;
        }  
        return false;
    }
    
    
    public function callService(PEIP_Facebook_Request_Message $message){
		if($this->setSessionId($message)){
			return parent::callService($message);
		}else{
			return 'ERROR';
		}
		
    } 
}