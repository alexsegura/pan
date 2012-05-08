<?php



/**
 * Skeleton subclass for representing a row from the 'template' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.pan
 */
class Pan_Db_Template extends Pan_Db_Propel_Template {
	
	public function getMaterializedPath() {
		
		$directory = Pan_Db_TemplateDirectoryQuery :: create()
				->findOneByIdTemplateDirectory($this->getIdTemplateDirectory());

		$ancestors = $directory->getAncestors();
		
		$elements = array();
		
		foreach ($ancestors as $ancestor) {
			if (!$ancestor->isRoot()) {
				$elements[] = $ancestor->getName();
			}
		}
		
		$elements[] = $directory->getName();
		
		return '/' . implode($elements, '/') . '/' . $this->getName();
		
	}
	
} // Pan_Db_Template
