<?php

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