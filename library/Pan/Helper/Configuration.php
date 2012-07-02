<?php

class Pan_Helper_Configuration extends Configuration implements ArrayAccess {
	
	public function offsetSet($offset, $value) {
        // Do nothing
    }
    
    public function offsetExists($offset) {
		return isset(self :: $_CONF[$offset]);
    }
    
    public function offsetUnset($offset) {
        // Do nothing
    }
    
    public function offsetGet($offset) {
    	switch ($offset) {
    		case 'keys' : 
				return array_keys(self :: $_CONF);    			
    			break;
    			
    		default : 
    			return Configuration :: get($offset);
    			break;
    	}
    }
	
}