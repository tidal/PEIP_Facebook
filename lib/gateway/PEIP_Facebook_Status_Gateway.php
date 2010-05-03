<?php

class PEIP_Facebook_Status_Gateway 
	extends PEIP_Facebook_User_Gateway {
	
    /**
     * @access protected
     * @param $content 
     * @return 
     */
    protected function buildMessage($content){ 
        $this->setApiMethod('facebook.users.setStatus'); 
        $params = array('facebook.users.setStatus', array(
        	'status'=>$content,
        	'status_includes_verb' => true,
        	'uid'=>$this->getUserId()
        ));    
        return parent::buildMessage($params);  
    } 

	public function receive(){
        if($message = parent::receive()){
        	if($message == 'OK'){
        		return 'Facebook Status Message published';
        	}else{
        		return $message;
        	}
        }
    }    
    
    
}