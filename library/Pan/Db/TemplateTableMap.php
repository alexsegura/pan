<?php



/**
 * This class defines the structure of the 'template' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.pan.map
 */
class Pan_Db_TemplateTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pan.map.Pan_Db_TemplateTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
		// attributes
		$this->setName(_DB_PREFIX_ . 'template');
		$this->setPhpName('Template');
		$this->setClassname('Pan_Db_Template');
		$this->setPackage('pan');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID_TEMPLATE', 'IdTemplate', 'INTEGER', true, 11, null);
		$this->addColumn('ID_TEMPLATE_DIRECTORY', 'IdTemplateDirectory', 'INTEGER', true, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 255, null);
		$this->addColumn('CONTENT', 'Content', 'LONGVARCHAR', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // Pan_Db_TemplateTableMap
