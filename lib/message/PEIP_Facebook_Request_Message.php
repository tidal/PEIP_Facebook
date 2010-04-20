<?php

class PEIP_Facebook_Request_Message 
	extends PEIP_Generice_Message {
		
    protected 
    	$headers = array(
    		'METHOD'=>''
    	); 		
	
	public function getMethod(){
		return $this->getHeader('METHOD');
	}   	
}