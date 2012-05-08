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
		
		$templateName = array_pop($pieces);
		
		array_shift($pieces);
		
		$level = count($pieces);
		$name = array_pop($pieces);
		
		$query = Pan_Db_TemplateDirectoryQuery :: create()
			->filterByNodeLevel($level)
			->filterByName($name)
			;
		
		if ($templateDirectory = $query->findOne()) {
			
			$templateQuery = Pan_Db_TemplateQuery :: create()
				->filterByIdTemplateDirectory($templateDirectory->getIdTemplateDirectory())
				->filterByName($templateName)
				;
			
			return $templateQuery->findOne();
				
		}
			
		return null;
		
	}
	
} // Pan_Db_TemplatePeer
