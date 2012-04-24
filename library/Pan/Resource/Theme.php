<?php

/**
 * Class used as a stream wrapper for the theme:// scheme. 
 * Allows to insert templates for any theme using Smarty's {include}. 
 * 
 * @author Alexandre Segura <mex.zktk@gmail.com>
 */
class Pan_Resource_Theme {
	
	private $path;
	private $content = '';
	private $exists = true;
	
	/**
	 * Resolves the template expressed by $path
	 * @param $path Can be expressed in the form theme://template@theme or theme://template
	 * @param $mode
	 * @param $options
	 * @param $opened_path
	 */
	function stream_open($path, $mode, $options, &$opened_path) {
		
		global $smarty;
		
		Pan :: $logger->log(__METHOD__);
		Pan :: $logger->log('Path : ' . $path);
		
		$url = parse_url($path);
		
		// Path with theme as host. Ex : theme://template@theme
		if (isset($url['user']) && isset($url['host'])) {
			$tplName 	= $url['user'];
			$themeName 	= $url['host'];
		// Path with default theme. Ex : theme://template
		} else {
			$tplName 	= $url['host'];
			$themeName 	= _THEME_NAME_;
		}
		
		Pan :: $logger->log("Path parsed for tpl $tplName from theme $themeName");
		Pan :: $logger->log(print_r($url, 1));
		
		$this->path 	= _PS_ROOT_DIR_.'/themes/' . $themeName . '/' . $tplName . '.tpl';
		
		
		Pan :: $logger->log("Resolved template " . $this->path);
		
		// FIXME 
		// Should return false if the template can't be opened ?
        return true;
        
    }

    /**
     * "Reads" the template, i.e fetches its content with current view context. 
     * @param $count
     */
    function stream_read($count) {
    	
    	Pan :: $logger->log(__METHOD__);
    	
    	global $smarty;
    	
    	$this->exists = $smarty->templateExists($this->path);
    	
    	if ($this->exists)  {
    		$this->content = $smarty->fetch($this->path);
    		return $this->content;
    	} else {
    		return '<!-- -->';
    	}
        
    }

    function stream_write($data) {
    	Pan :: $logger->log(__METHOD__);
        return 0;
    }

    function stream_tell() {
    	Pan :: $logger->log(__METHOD__);
        return 0;
    }

    /**
     * Returns false until the template is fetched. 
     */
    function stream_eof() {
    	Pan :: $logger->log(__METHOD__);
    	
    	if (!$this->exists) {
    		return true;
    	}
    	
        return !empty($this->content);
        
    }

    function stream_seek($offset, $whence) {
    	Pan :: $logger->log(__METHOD__);
        return true;
    }

    function stream_metadata($path, $option, $var) {
    	Pan :: $logger->log(__METHOD__);
        return false;
    }
	
}