<?php

class PEIP_Facebook_User_Gateway 
	extends PEIP_Facebook_Gateway {
	
	protected
		$userId,
		$method,
		$sessionStore;
		
	public function setUserId($uid){
		$this->userId = $uid;
	}	
	
	public function getUserId(){
		return $this->userId;
	}
			
	public function setSessionStore(PEIP_INF_Store $store){
		$this->sessionStore = $store;
	}	
	
	public function getSessionStore(){
		return $this->sessionStore;
	}	
    /**
     * @access protected
     * @param $content 
     * @return 
     */
    protected function buildMessage($content){ 
    	$builder = $this->getMessageBuilder();
    	$builder->setHeader('USER_ID', $this->userId);
    	if($this->sessionStore){
    		$builder->setHeader('SESSION_ID', $this->sessionStore->getValue($this->userId));
    	}   	
        return parent::buildMessage($content);   
    } 
	
}