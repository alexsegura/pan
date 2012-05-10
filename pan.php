<?php

class Pan extends Module {
	
	public static $logger;
	
	public function __construct() {
		
		$this->name 		= 'pan';
		$this->tab 			= 'front_office_features';
		$this->version 		= 1.0;
		$this->author 		= 'Alexandre Segura';
		$this->displayName 	= $this->l('Pan');
		$this->description 	= $this->l('Theme framework for PrestaShop');
		
		parent :: __construct();
		
		spl_autoload_register(array($this, 'autoload'));
		spl_autoload_register('__autoload');
		
		self :: $logger = new FileLogger(AbstractLogger :: DEBUG);
		self :: $logger->setFilename(_PS_ROOT_DIR_ . '/log/pan.log');
		
		$this->initPropel();
		
	}
	
	private function autoload() {
		
		$realpath 	= realpath(dirname(__FILE__) . '/library/');
		$pathes 	= explode(PATH_SEPARATOR, get_include_path());
		if (!in_array($realpath, $pathes)) {
			$pathes[] = $realpath;
		}
		set_include_path(implode(PATH_SEPARATOR, $pathes));
		
		require_once 'Zend/Loader/Autoloader.php';
		$loader = Zend_Loader_Autoloader :: getInstance();
		
		$loader->registerNamespace('Pan_');
		
	}
	
	private function initPropel() {
		
		require_once 'propel/Propel.php';
		
		Propel :: setConfiguration(array(
  			'datasources' => array(
    			'pan' => array(
			    	'adapter' => 'mysql',
			    	'connection' => array (
				        'dsn' 		=> 'mysql:host=' . _DB_SERVER_ . ';dbname=' . _DB_NAME_,
				        'user' 		=> _DB_USER_,
				        'password' 	=> _DB_PASSWD_
      				),
    			),
    			'default' => 'pan',
  			),
  			'generator_version' => '1.6.3',
		));
		
		Propel :: initialize();
		
	}
	
	private function getBaseURL() {
		global $currentIndex;
		return $currentIndex
			. '&configure=' 	. Tools :: getValue('configure')
			. '&module_name=' 	. Tools :: getValue('module_name')
			. '&tab_module=' 	. Tools :: getValue('tab_module')
			. '&token=' 		. Tools :: getAdminTokenLite('AdminModules');
	}
	
	public function install() {
		
		return parent :: install()
			&& $this->resetDb()
			&& $this->registerHook('header')
			;
			
	}
	
	private function resetDb() {
		
		$prefix = _DB_PREFIX_;
		$engine = _MYSQL_ENGINE_;
		
		$statements = array();
		
		$statements[] 	= "DROP TABLE IF EXISTS `${prefix}template_directory`";
		$statements[] 	= "CREATE TABLE `${prefix}template_directory` ("
						. "`id_template_directory` int(11) NOT NULL AUTO_INCREMENT,"
						. "`node_level` int(11) NOT NULL,"
						. "`node_left` int(11) NOT NULL,"
						. "`node_right` int(11) NOT NULL,"
						. "`name` varchar(64) DEFAULT NULL,"
						. "PRIMARY KEY (`id_template_directory`)"
						. ") ENGINE=$engine"
						;

		$statements[] 	= "DROP TABLE IF EXISTS `${prefix}template`";
		$statements[] 	= "CREATE TABLE `${prefix}template` ("
						. "`id_template` int(11) NOT NULL AUTO_INCREMENT,"
						. "`id_template_directory` int(11) NOT NULL,"
						. "`name` varchar(64) NOT NULL,"
						. "`content` text,"
						. "PRIMARY KEY (`id_template`)"
						. ") ENGINE=$engine"
						;

		foreach ($statements as $statement) {
			self :: $logger->log($statement);
			$res = Db :: getInstance()->Execute($statement);
			self :: $logger->log($res);
		}
		
		$root = new Pan_Db_TemplateDirectory();
		$root->setName('Templates');
		$root->makeRoot();
		$root->save();
		
		return true;
						
	}
	
	public function getContent() {
		
		global $smarty;
		
		$root = Pan_Db_TemplateDirectoryQuery :: create()->findRoot();
		
		$id_template_directory 	= Tools :: getValue('id_template_directory', false);
		$action					= Tools :: getValue('action', false);
		
		$templates = array();
		$directory = $root;
		
		if ($id_template_directory) {
			
			$directory = Pan_Db_TemplateDirectoryQuery :: create()
				->findOneByIdTemplateDirectory($id_template_directory);
			
			$rows = Pan_Db_TemplateQuery :: create()
				->findByIdTemplateDirectory($id_template_directory)
				;
				
			if (count($rows) > 0) {
				$templates = $rows;
			}
			
		}
		
		$smarty->assign('root', 		$root);
		$smarty->assign('directory', 	$directory);
		$smarty->assign('templates', 	$templates);
		$smarty->assign('baseURL', 		$this->getBaseURL());
		
		$screen_content = '';
		if ($action) {
			
			switch ($action) {
				
				case 'add-directory' : 
					
					$smarty->assign('parent', $directory);
					
					$screen_content = $smarty->fetch(_PS_ROOT_DIR_ . '/modules/pan/directory-form.tpl');
					
					break;
					
				case 'save-directory' : 
					
					$id_parent_template_directory 	= Tools :: getValue('id_parent_template_directory', false);
					$name 							= Tools :: getValue('name', false);
					
					if ($id_parent_template_directory) {
						
						// TODO Validate form
						
						if ($parentDirectory = 
							Pan_Db_TemplateDirectoryQuery :: create()->findOneByIdTemplateDirectory($id_parent_template_directory)) {
							
							$subDirectory = new Pan_Db_TemplateDirectory();
							$subDirectory->setName($name);
							
							$parentDirectory->addChild($subDirectory);
							$subDirectory->save();
							
							// Redirect to parent directory to see new directory and chill !
							Tools :: redirectAdmin($this->getBaseURL() 
								. '&id_template_directory=' . $id_parent_template_directory);
							return;
							
						}
						
					}
					
					break;
				
				case 'edit-template' : 
					
					$id_template = Tools :: getValue('id_template', false);
					if ($id_template) {
						$template = Pan_Db_TemplatePeer :: retrieveByPK($id_template);
						$smarty->assign('template', $template);
					}
					$screen_content = $smarty->fetch(_PS_ROOT_DIR_ . '/modules/pan/template-form.tpl');
					
					break;
					
				case 'save-template' : 
					
					$id_template = Tools :: getValue('id_template', false);
					if ($id_template) {
						$template = Pan_Db_TemplatePeer :: retrieveByPK($id_template);
					} else {
						$template = new Pan_Db_Template();
					}
					
					$id_template_directory 	= Tools :: getValue('id_template_directory', false);
					$name 					= Tools :: getValue('name', '');
					$content 				= Tools :: getValue('content', '');
					
					$template->setName($name);
					$template->setContent($content);
					
					if ($id_template_directory) {
						
						$template->setIdTemplateDirectory($id_template_directory);
						$template->save();
						
						Tools :: redirectAdmin($this->getBaseURL() 
							. '&id_template_directory=' . $id_template_directory);
						return;
						
					}
					
					$smarty->assign('template', $template);
					$screen_content = $smarty->fetch(_PS_ROOT_DIR_ . '/modules/pan/template-form.tpl');
					
					break;
				
			}
			
		} else {
			$screen_content = $smarty->fetch(_PS_ROOT_DIR_ . '/modules/pan/explorer.tpl');
		}
		
		$smarty->assign('screen_content', $screen_content);
		$content = $this->display(__FILE__, 'preferences.tpl');
		
		return $content;
		
	}
	
	public function hookHeader($params) {
		
		global $smarty;
		
		stream_wrapper_register("theme", 	"Pan_Resource_Theme");
		stream_wrapper_register("db", 		"Pan_Resource_Db");
		
		$smarty->registerPlugin('function', 'ps_url', 			array('Pan', 'ps_url'));
		$smarty->registerPlugin('function', 'ps_hook', 			array('Pan', 'ps_hook'));
		$smarty->registerPlugin('function', 'ps_breadcrumb',	array('Pan', 'ps_breadcrumb'));
		
		$smarty->registerPlugin('block', 	'ps_show', 		array('Pan', 'ps_show'));
		
	}
	
	public static function ps_hook($params, &$smarty) {
		
		$moduleName = $params['mod']; // FIXME mod should be optional
		$hookName	= $params['hook'];
		$viewName	= isset($params['view']) ? $params['view'] : null;
		
	    $module = Module :: getInstanceByName($moduleName);
	    $contents = Module :: hookExec($hookName, array(), $module->id);
	    
	    if ($viewName) {
	    	self :: $logger->log("An alternative view was specified : $viewName");
	    	
	    	$path 	= _PS_ROOT_DIR_.'/themes/' . _THEME_NAME_ 
	    			. '/modules/' . $moduleName . '/' . $viewName . '.tpl';
	    			
	    	self :: $logger->log("Rendering view : " . $path);
	    	$contents = $smarty->fetch($path);
	    }
	    
	    return $contents;
		
	}
	
	public static function ps_breadcrumb($params, &$smarty) {
		return '';
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