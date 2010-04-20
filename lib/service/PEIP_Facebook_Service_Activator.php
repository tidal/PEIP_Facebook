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
	extends PEIP_ABS_Service_Activator {

    /**
     * @access public
     * @param $serviceCallable 
     * @param $inputChannel 
     * @param $outputChannel 
     * @return 
     */
    public function __construct(FacebookRestClient $facebookRestClient, PEIP_INF_Channel $inputChannel, PEIP_INF_Channel $outputChannel = NULL){
        $this->serviceCallable = array($facebookRestClient, 'call_method');
        $this->setInputChannel($inputChannel);
        if(is_object($outputChannel)){
            $this->setOutputChannel($outputChannel);    
        }   
    } 
				
    public function callService(PEIP_Facebook_Request_Message $message){
        return $res = call_user_func_array($this->serviceCallable, array($message->getMethod(), $message->getContent()));
    } 
}