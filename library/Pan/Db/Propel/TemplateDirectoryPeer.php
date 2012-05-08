<?php


define('PAN_DB_TEMPLATEDIRECTORY_ID_TEMPLATE_DIRECTORY', _DB_PREFIX_ . 'template_directory.ID_TEMPLATE_DIRECTORY');
define('PAN_DB_TEMPLATEDIRECTORY_NODE_LEVEL', _DB_PREFIX_ . 'template_directory.NODE_LEVEL');
define('PAN_DB_TEMPLATEDIRECTORY_NODE_LEFT', _DB_PREFIX_ . 'template_directory.NODE_LEFT');
define('PAN_DB_TEMPLATEDIRECTORY_NODE_RIGHT', _DB_PREFIX_ . 'template_directory.NODE_RIGHT');
define('PAN_DB_TEMPLATEDIRECTORY_NAME', _DB_PREFIX_ . 'template_directory.NAME');
define('PAN_DB_TEMPLATEDIRECTORY_TABLE_NAME', _DB_PREFIX_ . 'template_directory');

/**
 * Base static class for performing query and update operations on the 'template_directory' table.
 *
 * 
 *
 * @package    propel.generator.pan.om
 */
abstract class Pan_Db_Propel_TemplateDirectoryPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'pan';

	/** the table name for this class */
	const TABLE_NAME = PAN_DB_TEMPLATEDIRECTORY_TABLE_NAME;

	/** the related Propel class for this table */
	const OM_CLASS = 'Pan_Db_TemplateDirectory';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'pan.Pan_Db_TemplateDirectory';

	/** the related TableMap class for this table */
	const TM_CLASS = 'Pan_Db_TemplateDirectoryTableMap';

	/** The total number of columns. */
	const NUM_COLUMNS = 5;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
	const NUM_HYDRATE_COLUMNS = 5;

	/** the column name for the ID_TEMPLATE_DIRECTORY field */
	const ID_TEMPLATE_DIRECTORY = PAN_DB_TEMPLATEDIRECTORY_ID_TEMPLATE_DIRECTORY;

	/** the column name for the NODE_LEVEL field */
	const NODE_LEVEL = PAN_DB_TEMPLATEDIRECTORY_NODE_LEVEL;

	/** the column name for the NODE_LEFT field */
	const NODE_LEFT = PAN_DB_TEMPLATEDIRECTORY_NODE_LEFT;

	/** the column name for the NODE_RIGHT field */
	const NODE_RIGHT = PAN_DB_TEMPLATEDIRECTORY_NODE_RIGHT;

	/** the column name for the NAME field */
	const NAME = PAN_DB_TEMPLATEDIRECTORY_NAME;

	/** The default string format for model objects of the related table **/
	const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * An identiy map to hold any loaded instances of Pan_Db_TemplateDirectory objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array Pan_Db_TemplateDirectory[]
	 */
	public static $instances = array();


	// nested_set behavior
	
	/**
	 * Left column for the set
	 */
	const LEFT_COL = PAN_DB_TEMPLATEDIRECTORY_NODE_LEFT;
	
	/**
	 * Right column for the set
	 */
	const RIGHT_COL = PAN_DB_TEMPLATEDIRECTORY_NODE_RIGHT;
	
	/**
	 * Level column for the set
	 */
	const LEVEL_COL = PAN_DB_TEMPLATEDIRECTORY_NODE_LEVEL;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	protected static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('IdTemplateDirectory', 'NodeLevel', 'NodeLeft', 'NodeRight', 'Name', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('idTemplateDirectory', 'nodeLevel', 'nodeLeft', 'nodeRight', 'name', ),
		BasePeer::TYPE_COLNAME => array (self::ID_TEMPLATE_DIRECTORY, self::NODE_LEVEL, self::NODE_LEFT, self::NODE_RIGHT, self::NAME, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID_TEMPLATE_DIRECTORY', 'NODE_LEVEL', 'NODE_LEFT', 'NODE_RIGHT', 'NAME', ),
		BasePeer::TYPE_FIELDNAME => array ('id_template_directory', 'node_level', 'node_left', 'node_right', 'name', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	protected static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('IdTemplateDirectory' => 0, 'NodeLevel' => 1, 'NodeLeft' => 2, 'NodeRight' => 3, 'Name' => 4, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('idTemplateDirectory' => 0, 'nodeLevel' => 1, 'nodeLeft' => 2, 'nodeRight' => 3, 'name' => 4, ),
		BasePeer::TYPE_COLNAME => array (self::ID_TEMPLATE_DIRECTORY => 0, self::NODE_LEVEL => 1, self::NODE_LEFT => 2, self::NODE_RIGHT => 3, self::NAME => 4, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID_TEMPLATE_DIRECTORY' => 0, 'NODE_LEVEL' => 1, 'NODE_LEFT' => 2, 'NODE_RIGHT' => 3, 'NAME' => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('id_template_directory' => 0, 'node_level' => 1, 'node_left' => 2, 'node_right' => 3, 'name' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. Pan_Db_TemplateDirectoryPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(Pan_Db_TemplateDirectoryPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY);
			$criteria->addSelectColumn(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL);
			$criteria->addSelectColumn(Pan_Db_TemplateDirectoryPeer::NODE_LEFT);
			$criteria->addSelectColumn(Pan_Db_TemplateDirectoryPeer::NODE_RIGHT);
			$criteria->addSelectColumn(Pan_Db_TemplateDirectoryPeer::NAME);
		} else {
			$criteria->addSelectColumn($alias . '.ID_TEMPLATE_DIRECTORY');
			$criteria->addSelectColumn($alias . '.NODE_LEVEL');
			$criteria->addSelectColumn($alias . '.NODE_LEFT');
			$criteria->addSelectColumn($alias . '.NODE_RIGHT');
			$criteria->addSelectColumn($alias . '.NAME');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(Pan_Db_TemplateDirectoryPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			Pan_Db_TemplateDirectoryPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Selects one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     Pan_Db_TemplateDirectory
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = Pan_Db_TemplateDirectoryPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Selects several row from the DB.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return Pan_Db_TemplateDirectoryPeer::populateObjects(Pan_Db_TemplateDirectoryPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			Pan_Db_TemplateDirectoryPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      Pan_Db_TemplateDirectory $value A Pan_Db_TemplateDirectory object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool($obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = serialize(array((string) $obj->getIdTemplateDirectory(), (string) $obj->getNodeLevel()));
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A Pan_Db_TemplateDirectory object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Pan_Db_TemplateDirectory) {
				$key = serialize(array((string) $value->getIdTemplateDirectory(), (string) $value->getNodeLevel()));
			} elseif (is_array($value) && count($value) === 2) {
				// assume we've been passed a primary key
				$key = serialize(array((string) $value[0], (string) $value[1]));
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Pan_Db_TemplateDirectory object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     Pan_Db_TemplateDirectory Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to template_directory
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null && $row[$startcol + 1] === null) {
			return null;
		}
		return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
	}

	/**
	 * Retrieves the primary key from the DB resultset row
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return array((int) $row[$startcol], (int) $row[$startcol + 1]);
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = Pan_Db_TemplateDirectoryPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = Pan_Db_TemplateDirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = Pan_Db_TemplateDirectoryPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				Pan_Db_TemplateDirectoryPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (Pan_Db_TemplateDirectory object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = Pan_Db_TemplateDirectoryPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = Pan_Db_TemplateDirectoryPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + Pan_Db_TemplateDirectoryPeer::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = Pan_Db_TemplateDirectoryPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			Pan_Db_TemplateDirectoryPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(Pan_Db_Propel_TemplateDirectoryPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(Pan_Db_Propel_TemplateDirectoryPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new Pan_Db_TemplateDirectoryTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? Pan_Db_TemplateDirectoryPeer::CLASS_DEFAULT : Pan_Db_TemplateDirectoryPeer::OM_CLASS;
	}

	/**
	 * Performs an INSERT on the database, given a Pan_Db_TemplateDirectory or Criteria object.
	 *
	 * @param      mixed $values Criteria or Pan_Db_TemplateDirectory object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from Pan_Db_TemplateDirectory object
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Performs an UPDATE on the database, given a Pan_Db_TemplateDirectory or Criteria object.
	 *
	 * @param      mixed $values Criteria or Pan_Db_TemplateDirectory object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY);
			$value = $criteria->remove(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY);
			if ($value) {
				$selectCriteria->add(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(Pan_Db_TemplateDirectoryPeer::TABLE_NAME);
			}

			$comparison = $criteria->getComparison(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL);
			$value = $criteria->remove(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL);
			if ($value) {
				$selectCriteria->add(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(Pan_Db_TemplateDirectoryPeer::TABLE_NAME);
			}

		} else { // $values is Pan_Db_TemplateDirectory object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Deletes all rows from the template_directory table.
	 *
	 * @param      PropelPDO $con the connection to use
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(Pan_Db_TemplateDirectoryPeer::TABLE_NAME, $con, Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			Pan_Db_TemplateDirectoryPeer::clearInstancePool();
			Pan_Db_TemplateDirectoryPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs a DELETE on the database, given a Pan_Db_TemplateDirectory or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or Pan_Db_TemplateDirectory object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			Pan_Db_TemplateDirectoryPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof Pan_Db_TemplateDirectory) { // it's a model object
			// invalidate the cache for this single object
			Pan_Db_TemplateDirectoryPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			// primary key is composite; we therefore, expect
			// the primary key passed to be an array of pkey values
			if (count($values) == count($values, COUNT_RECURSIVE)) {
				// array is not multi-dimensional
				$values = array($values);
			}
			foreach ($values as $value) {
				$criterion = $criteria->getNewCriterion(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $value[0]);
				$criterion->addAnd($criteria->getNewCriterion(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $value[1]));
				$criteria->addOr($criterion);
				// we can invalidate the cache for this single PK
				Pan_Db_TemplateDirectoryPeer::removeInstanceFromPool($value);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			Pan_Db_TemplateDirectoryPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given Pan_Db_TemplateDirectory object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      Pan_Db_TemplateDirectory $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate($obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(Pan_Db_TemplateDirectoryPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Pan_Db_TemplateDirectoryPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve object using using composite pkey values.
	 * @param      int $id_template_directory
	 * @param      int $node_level
	 * @param      PropelPDO $con
	 * @return     Pan_Db_TemplateDirectory
	 */
	public static function retrieveByPK($id_template_directory, $node_level, PropelPDO $con = null) {
		$_instancePoolKey = serialize(array((string) $id_template_directory, (string) $node_level));
 		if (null !== ($obj = Pan_Db_TemplateDirectoryPeer::getInstanceFromPool($_instancePoolKey))) {
 			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$criteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$criteria->add(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $id_template_directory);
		$criteria->add(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $node_level);
		$v = Pan_Db_TemplateDirectoryPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
	// nested_set behavior
	
	/**
	 * Returns the root node for a given scope
	 *
	 * @param      PropelPDO $con	Connection to use.
	 * @return     Pan_Db_TemplateDirectory			Propel object for root node
	 */
	public static function retrieveRoot(PropelPDO $con = null)
	{
		$c = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$c->add(Pan_Db_TemplateDirectoryPeer::LEFT_COL, 1, Criteria::EQUAL);
	
		return Pan_Db_TemplateDirectoryPeer::doSelectOne($c, $con);
	}
	
	/**
	 * Returns the whole tree node for a given scope
	 *
	 * @param      Criteria $criteria	Optional Criteria to filter the query
	 * @param      PropelPDO $con	Connection to use.
	 * @return     Pan_Db_TemplateDirectory			Propel object for root node
	 */
	public static function retrieveTree(Criteria $criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		}
		$criteria->addAscendingOrderByColumn(Pan_Db_TemplateDirectoryPeer::LEFT_COL);
	
		return Pan_Db_TemplateDirectoryPeer::doSelect($criteria, $con);
	}
	
	/**
	 * Tests if node is valid
	 *
	 * @param      Pan_Db_TemplateDirectory $node	Propel object for src node
	 * @return     bool
	 */
	public static function isValid(Pan_Db_TemplateDirectory $node = null)
	{
		if (is_object($node) && $node->getRightValue() > $node->getLeftValue()) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Delete an entire tree
	 * 
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     int  The number of deleted nodes
	 */
	public static function deleteTree(PropelPDO $con = null)
	{
		return Pan_Db_TemplateDirectoryPeer::doDeleteAll($con);
	}
	
	/**
	 * Adds $delta to all L and R values that are >= $first and <= $last.
	 * '$delta' can also be negative.
	 *
	 * @param      int $delta		Value to be shifted by, can be negative
	 * @param      int $first		First node to be shifted
	 * @param      int $last			Last node to be shifted (optional)
	 * @param      PropelPDO $con		Connection to use.
	 */
	public static function shiftRLValues($delta, $first, $last = null, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
	
		// Shift left column values
		$whereCriteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$criterion = $whereCriteria->getNewCriterion(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $first, Criteria::GREATER_EQUAL);
		if (null !== $last) {
			$criterion->addAnd($whereCriteria->getNewCriterion(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $last, Criteria::LESS_EQUAL));
		}
		$whereCriteria->add($criterion);
	
		$valuesCriteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$valuesCriteria->add(Pan_Db_TemplateDirectoryPeer::LEFT_COL, array('raw' => Pan_Db_TemplateDirectoryPeer::LEFT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);
	
		BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
	
		// Shift right column values
		$whereCriteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$criterion = $whereCriteria->getNewCriterion(Pan_Db_TemplateDirectoryPeer::RIGHT_COL, $first, Criteria::GREATER_EQUAL);
		if (null !== $last) {
			$criterion->addAnd($whereCriteria->getNewCriterion(Pan_Db_TemplateDirectoryPeer::RIGHT_COL, $last, Criteria::LESS_EQUAL));
		}
		$whereCriteria->add($criterion);
	
		$valuesCriteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$valuesCriteria->add(Pan_Db_TemplateDirectoryPeer::RIGHT_COL, array('raw' => Pan_Db_TemplateDirectoryPeer::RIGHT_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);
	
		BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
	}
	
	/**
	 * Adds $delta to level for nodes having left value >= $first and right value <= $last.
	 * '$delta' can also be negative.
	 *
	 * @param      int $delta		Value to be shifted by, can be negative
	 * @param      int $first		First node to be shifted
	 * @param      int $last			Last node to be shifted
	 * @param      PropelPDO $con		Connection to use.
	 */
	public static function shiftLevel($delta, $first, $last, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
	
		$whereCriteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$whereCriteria->add(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $first, Criteria::GREATER_EQUAL);
		$whereCriteria->add(Pan_Db_TemplateDirectoryPeer::RIGHT_COL, $last, Criteria::LESS_EQUAL);
	
		$valuesCriteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$valuesCriteria->add(Pan_Db_TemplateDirectoryPeer::LEVEL_COL, array('raw' => Pan_Db_TemplateDirectoryPeer::LEVEL_COL . ' + ?', 'value' => $delta), Criteria::CUSTOM_EQUAL);
	
		BasePeer::doUpdate($whereCriteria, $valuesCriteria, $con);
	}
	
	/**
	 * Reload all already loaded nodes to sync them with updated db
	 *
	 * @param      Pan_Db_TemplateDirectory $prune		Object to prune from the update
	 * @param      PropelPDO $con		Connection to use.
	 */
	public static function updateLoadedNodes($prune = null, PropelPDO $con = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			$keys = array();
			foreach (Pan_Db_TemplateDirectoryPeer::$instances as $obj) {
				if (!$prune || !$prune->equals($obj)) {
					$keys[] = $obj->getPrimaryKey();
				}
			}
	
			if (!empty($keys)) {
				// We don't need to alter the object instance pool; we're just modifying these ones
				// already in the pool.
				$criteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
	
				// Loop on each instances in pool
				foreach ($keys as $values) {
				  // Create initial Criterion
					$cton = $criteria->getNewCriterion(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $values[0]);
	
					// Create next criterion
					$nextcton = $criteria->getNewCriterion(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $values[1]);
					// And merge it with the first
					$cton->addAnd($nextcton);
	
					// Add final Criterion to Criteria
					$criteria->addOr($cton);
				}
				$stmt = Pan_Db_TemplateDirectoryPeer::doSelectStmt($criteria, $con);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
					$key = Pan_Db_TemplateDirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
					if (null !== ($object = Pan_Db_TemplateDirectoryPeer::getInstanceFromPool($key))) {
						$object->setLevel($row[1]);
						$object->clearNestedSetChildren();
						$object->setLeftValue($row[2]);
						$object->setRightValue($row[3]);
					}
				}
				$stmt->closeCursor();
			}
		}
	}
	
	/**
	 * Update the tree to allow insertion of a leaf at the specified position
	 *
	 * @param      int $left	left column value
	 * @param      mixed $prune	Object to prune from the shift
	 * @param      PropelPDO $con	Connection to use.
	 */
	public static function makeRoomForLeaf($left, $prune = null, PropelPDO $con = null)
	{
		// Update database nodes
		Pan_Db_TemplateDirectoryPeer::shiftRLValues(2, $left, null, $con);
	
		// Update all loaded nodes
		Pan_Db_TemplateDirectoryPeer::updateLoadedNodes($prune, $con);
	}
	
	/**
	 * Update the tree to allow insertion of a leaf at the specified position
	 *
	 * @param      PropelPDO $con	Connection to use.
	 */
	public static function fixLevels(PropelPDO $con = null)
	{
		$c = new Criteria();
		$c->addAscendingOrderByColumn(Pan_Db_TemplateDirectoryPeer::LEFT_COL);
		$stmt = Pan_Db_TemplateDirectoryPeer::doSelectStmt($c, $con);
		
		// set the class once to avoid overhead in the loop
		$cls = Pan_Db_TemplateDirectoryPeer::getOMClass(false);
		$level = null;
		// iterate over the statement
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
	
			// hydrate object
			$key = Pan_Db_TemplateDirectoryPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null === ($obj = Pan_Db_TemplateDirectoryPeer::getInstanceFromPool($key))) {
				$obj = new $cls();
				$obj->hydrate($row);
				Pan_Db_TemplateDirectoryPeer::addInstanceToPool($obj, $key);
			}
	
			// compute level
			// Algorithm shamelessly stolen from sfPropelActAsNestedSetBehaviorPlugin
			// Probably authored by Tristan Rivoallan
			if ($level === null) {
				$level = 0;
				$i = 0;
				$prev = array($obj->getRightValue());
			} else {
				while ($obj->getRightValue() > $prev[$i]) {
					$i--;
				}
				$level = ++$i;
				$prev[$i] = $obj->getRightValue();
			}
	
			// update level in node if necessary
			if ($obj->getLevel() !== $level) {
				$obj->setLevel($level);
				$obj->save($con);
			}
		}
		$stmt->closeCursor();
	}

} // Pan_Db_Propel_TemplateDirectoryPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
Pan_Db_Propel_TemplateDirectoryPeer::buildTableMap();

