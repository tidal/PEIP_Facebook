<?php
/*
 * This file is part of the PEIP_Facebook package.
 * (c) 2010 Timo Michna <timomichna/yahoo.de>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * PEIP_Facebook_Request_Message 
 *
 * @author Timo Michna <timomichna/yahoo.de>
 * @package PEIP_Facebook 
 * @subpackage message 
 * @extends PEIP_Generice_Message
 * @implements PEIP_INF_Container, PEIP_INF_Message, PEIP_INF_Buildable
 */
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