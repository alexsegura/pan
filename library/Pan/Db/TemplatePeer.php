<?php



/**
 * Skeleton subclass for performing query and update operations on the 'template' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.pan
 */
class Pan_Db_TemplatePeer extends Pan_Db_Propel_TemplatePeer {
	
	public static function retrieveByPath($path) {
		
		$pieces = explode('/', $path);
		
		Pan :: $logger->log('pieces : ' . print_r($pieces, 1));
		
		$templateName = array_pop($pieces);
		
		array_shift($pieces);
		
		$level = count($pieces);
		$name = array_pop($pieces);
		
		if ($level > 0) {
			Pan :: $logger->log("Looking for dir $name at level $level");
			// Several dirs with the same name can be at the same level !
			$directories = Pan_Db_TemplateDirectoryQuery :: create()
				->filterByNodeLevel($level)
				->filterByName($name)
				->find()
				;
		} else {
			$directories = array(Pan_Db_TemplateDirectoryQuery :: create()->findRoot());
		}
		
		foreach ($directories as $directory) {
			
			$templateQuery = Pan_Db_TemplateQuery :: create()
				->filterByIdTemplateDirectory($directory->getIdTemplateDirectory())
				->filterByName($templateName)
				;
			
			if ($template = $templateQuery->findOne()) {
				return $template;
			}
		}
			
		return null;
		
	}
	
} // Pan_Db_TemplatePeer
