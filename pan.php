<?php

require_once _PS_MODULE_DIR_ . 'pan/library/Pan/Resource/Theme.php';

class Pan extends Module {
	
	public static $logger;
	
	public function __construct() {
		
		$this->name 		= 'pan';
		$this->tab 			= 'front_office_features';
		$this->version 		= 1.0;
		$this->author 		= 'Alexandre Segura';
		$this->displayName 	= $this->l('{pan}');
		$this->description 	= $this->l('Theme framework for PrestaShop');
		
		parent :: __construct();
		
		self :: $logger = new FileLogger(AbstractLogger :: DEBUG);
		self :: $logger->setFilename(_PS_ROOT_DIR_ . '/log/pan.log');
		
		self :: $logger->log('ok');

	}
	
	public function install() {
		
		return parent :: install()
			&& $this->registerHook('header')
			;
			
	}
	
	public function hookHeader($params) {
		
		global $smarty;
		
		stream_wrapper_register("theme", "Pan_Resource_Theme");
		
		$smarty->registerPlugin('function', 'ps_url', 		array('Pan', 'ps_url'));
		$smarty->registerPlugin('function', 'ps_hook', 		array('Pan', 'ps_hook'));
		$smarty->registerPlugin('block', 	'ps_show', 		array('Pan', 'ps_show'));
		
	}
	
	public static function ps_get_template($tpl_name, &$tpl_source, $smarty) {
	   self :: $logger->log(__FUNCTION__);
	   $tpl_source = 'IT WORKS';
	   return true;
	}
	
	public static function ps_get_timestamp($tpl_name, &$tpl_timestamp, $smarty) {
	   self :: $logger->log(__FUNCTION__);
	   $tpl_timestamp = strtotime('2012-04-20 12:00:00');
	   return true;
	}
	
	public static function ps_get_secure($tpl_name, &$smarty) {
	   self :: $logger->log(__FUNCTION__);
	   return true;
	}
	
	public static function ps_get_trusted($tpl_name, &$smarty) {
	   self :: $logger->log(__FUNCTION__);
	   return true;
	}
	
	public static function ps_hook($params, &$smarty) {
		
		$moduleName = $params['mod'];
		$hookName	= $params['hook'];
		
	    $module = Module :: getInstanceByName($moduleName);
	    return Module :: hookExec($hookName, array(), $module->id);
		
	}
	
	public static function ps_show($params, $content, &$smarty, &$repeat) {
		
		$page_name = $smarty->get_template_vars('page_name');
		self :: $logger->log('page_name : ' . $page_name);
		
		$includes = $excludes = array();
		if (isset($content)) {
			
			$includes = isset($params['includes']) ? $params['includes'] : array();
			$excludes = isset($params['excludes']) ? $params['excludes'] : array();
			
			if (is_string($includes)) {
				$includes = explode('|', $includes);
			}
			
			if (is_string($excludes)) {
				$excludes = explode('|', $excludes);
			}
			
			self :: $logger->log('includes : ' . print_r($includes, 1));
			self :: $logger->log('excludes : ' . print_r($excludes, 1));
			
			if (count($includes) > 0) {
				return in_array($page_name, $includes) ? $content : '';
			} else if (count($excludes) > 0) {
				return !in_array($page_name, $excludes) ? $content : '';
			}
			
		}
		
	}
	
	public static function ps_url($params, &$smarty) {
		
		global $cookie;
		
		$url = '';
		
		$link = new Link();
		
		$keys 	= array_keys($params);
		$first 	= array_shift($keys);
		
		self :: $logger->log("First argument is $first");
		
		$objectModels = array(
			'product', 
			'category', 
			'manufacturer', 
			'cms'
		);
		
		if (in_array($first, $objectModels)) {
			
			$value 			= $params[$first];
			$methodParams 	= array();
			if (is_array($value)) {
				if (isset($value['id_' . $first])) {
					$methodParams[] = $value['id_' . $first];
					if (isset($value['link_rewrite'])) {
						$methodParams[] = $value['link_rewrite'];
					}
				}
			} else if (is_numeric($value)) {
				$methodParams[] = (int) $value;
			} else if (is_object($value)) {
				$methodParams[] = $value;
			}
			
			$method = 'get' . ucfirst($first) . 'Link';
			
			self :: $logger->log("Link :: $method");
			self :: $logger->log(print_r($methodParams, 1));
			
			// TODO Check if method exists
			$url = call_user_func_array(array($link, $method), $methodParams);
			
			// Check for additional params
			array_shift($params);
			if (count($params) > 0) {
				$url .= '&' . http_build_query($params);
			}
			
		}
		
		return $url;
		
	}
	
}