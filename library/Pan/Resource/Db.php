<?php

/**
 * Class used as a stream wrapper for the db:// scheme. 
 * Loads templates from the database, based on their materialized path.  
 * 
 * @author Alexandre Segura <mex.zktk@gmail.com>
 */
class Pan_Resource_Db {
	
	private $path;
	private $content = '';
	private $exists = true;
	
	private $template;
	private $eof = false;
	
	/**
	 * Resolves the template expressed by $path
	 * @param $path Can be expressed in the form db:///path/to/template
	 * @param $mode
	 * @param $options
	 * @param $opened_path
	 */
	function stream_open($path, $mode, $options, &$opened_path) {
		
		global $smarty;
		
		Pan :: $logger->log(__METHOD__);
		Pan :: $logger->log('Path : ' . $path);
		
		$path = str_replace('db://', '', $path);
		
		Pan :: $logger->log('MPath : ' . $path);
		
		$this->template = Pan_Db_TemplatePeer :: retrieveByPath($path);
		
		Pan :: $logger->log('Content : ' . $this->template->getContent());
		
		// FIXME 
		// Should return false if the template can't be opened ?
        return true;
        
    }

    function stream_read($count) {
    	
    	Pan :: $logger->log(__METHOD__);
    	
    	$this->eof = true;
    	
    	if (isset($this->template)) {
    		return $this->template->getContent();
    	}  else {
    		// Don't return an empty string to avoid a Smarty error !
    		return '<!-- -->';
    	}
        
    }

    /**
     * Returns false until the template is fetched. 
     */
    function stream_eof() {
        return $this->eof;
    }
    
    /* Not implemented */
    
	function stream_write($data) {
    	Pan :: $logger->log(__METHOD__);
        return 0;
    }

    function stream_tell() {
    	Pan :: $logger->log(__METHOD__);
        return 0;
    }

    function stream_seek($offset, $whence) {
        return true;
    }

    function stream_metadata($path, $option, $var) {
        return false;
    }
	
}