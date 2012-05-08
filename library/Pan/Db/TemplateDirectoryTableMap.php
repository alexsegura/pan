<?php



/**
 * This class defines the structure of the 'template_directory' table.
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
class Pan_Db_TemplateDirectoryTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'pan.map.Pan_Db_TemplateDirectoryTableMap';

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
		$this->setName(_DB_PREFIX_ . 'template_directory');
		$this->setPhpName('TemplateDirectory');
		$this->setClassname('Pan_Db_TemplateDirectory');
		$this->setPackage('pan');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID_TEMPLATE_DIRECTORY', 'IdTemplateDirectory', 'INTEGER', true, 11, null);
		$this->addPrimaryKey('NODE_LEVEL', 'NodeLevel', 'INTEGER', true, 10, null);
		$this->addColumn('NODE_LEFT', 'NodeLeft', 'INTEGER', true, null, null);
		$this->addColumn('NODE_RIGHT', 'NodeRight', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 64, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

	/**
	 *
	 * Gets the list of behaviors registered for this table
	 *
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'nested_set' => array('left_column' => 'node_left', 'right_column' => 'node_right', 'level_column' => 'node_level', 'use_scope' => 'false', 'scope_column' => 'tree_scope', 'method_proxies' => 'false', ),
		);
	} // getBehaviors()

} // Pan_Db_TemplateDirectoryTableMap
