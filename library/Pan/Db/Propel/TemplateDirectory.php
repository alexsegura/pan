<?php


/**
 * Base class that represents a row from the 'template_directory' table.
 *
 * 
 *
 * @package    propel.generator.pan.om
 */
abstract class Pan_Db_Propel_TemplateDirectory extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'Pan_Db_TemplateDirectoryPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        Pan_Db_TemplateDirectoryPeer
	 */
	protected static $peer;

	/**
	 * The value for the id_template_directory field.
	 * @var        int
	 */
	protected $id_template_directory;

	/**
	 * The value for the node_level field.
	 * @var        int
	 */
	protected $node_level;

	/**
	 * The value for the node_left field.
	 * @var        int
	 */
	protected $node_left;

	/**
	 * The value for the node_right field.
	 * @var        int
	 */
	protected $node_right;

	/**
	 * The value for the name field.
	 * @var        string
	 */
	protected $name;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	// nested_set behavior
	
	/**
	 * Queries to be executed in the save transaction
	 * @var        array
	 */
	protected $nestedSetQueries = array();
	
	/**
	 * Internal cache for children nodes
	 * @var        null|PropelObjectCollection
	 */
	protected $collNestedSetChildren = null;
	
	/**
	 * Internal cache for parent node
	 * @var        null|Pan_Db_TemplateDirectory
	 */
	protected $aNestedSetParent = null;
	

	/**
	 * Get the [id_template_directory] column value.
	 * 
	 * @return     int
	 */
	public function getIdTemplateDirectory()
	{
		return $this->id_template_directory;
	}

	/**
	 * Get the [node_level] column value.
	 * 
	 * @return     int
	 */
	public function getNodeLevel()
	{
		return $this->node_level;
	}

	/**
	 * Get the [node_left] column value.
	 * 
	 * @return     int
	 */
	public function getNodeLeft()
	{
		return $this->node_left;
	}

	/**
	 * Get the [node_right] column value.
	 * 
	 * @return     int
	 */
	public function getNodeRight()
	{
		return $this->node_right;
	}

	/**
	 * Get the [name] column value.
	 * 
	 * @return     string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of [id_template_directory] column.
	 * 
	 * @param      int $v new value
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 */
	public function setIdTemplateDirectory($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_template_directory !== $v) {
			$this->id_template_directory = $v;
			$this->modifiedColumns[] = Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY;
		}

		return $this;
	} // setIdTemplateDirectory()

	/**
	 * Set the value of [node_level] column.
	 * 
	 * @param      int $v new value
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 */
	public function setNodeLevel($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->node_level !== $v) {
			$this->node_level = $v;
			$this->modifiedColumns[] = Pan_Db_TemplateDirectoryPeer::NODE_LEVEL;
		}

		return $this;
	} // setNodeLevel()

	/**
	 * Set the value of [node_left] column.
	 * 
	 * @param      int $v new value
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 */
	public function setNodeLeft($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->node_left !== $v) {
			$this->node_left = $v;
			$this->modifiedColumns[] = Pan_Db_TemplateDirectoryPeer::NODE_LEFT;
		}

		return $this;
	} // setNodeLeft()

	/**
	 * Set the value of [node_right] column.
	 * 
	 * @param      int $v new value
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 */
	public function setNodeRight($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->node_right !== $v) {
			$this->node_right = $v;
			$this->modifiedColumns[] = Pan_Db_TemplateDirectoryPeer::NODE_RIGHT;
		}

		return $this;
	} // setNodeRight()

	/**
	 * Set the value of [name] column.
	 * 
	 * @param      string $v new value
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 */
	public function setName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = Pan_Db_TemplateDirectoryPeer::NAME;
		}

		return $this;
	} // setName()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id_template_directory = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->node_level = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->node_left = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->node_right = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 5; // 5 = Pan_Db_TemplateDirectoryPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Pan_Db_TemplateDirectory object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = Pan_Db_TemplateDirectoryPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = Pan_Db_TemplateDirectoryQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// nested_set behavior
			if ($this->isRoot()) {
				throw new PropelException('Deletion of a root node is disabled for nested sets. Use Pan_Db_TemplateDirectoryPeer::deleteTree() instead to delete an entire tree');
			}
			
			if ($this->isInTree()) {
				$this->deleteDescendants($con);
			}

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				// nested_set behavior
				if ($this->isInTree()) {
					// fill up the room that was used by the node
					Pan_Db_TemplateDirectoryPeer::shiftRLValues(-2, $this->getRightValue() + 1, null, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// nested_set behavior
			if ($this->isNew() && $this->isRoot()) {
				// check if no other root exist in, the tree
				$nbRoots = Pan_Db_TemplateDirectoryQuery::create()
					->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEFT_COL, 1, Criteria::EQUAL)
					->count($con);
				if ($nbRoots > 0) {
						throw new PropelException('A root node already exists in this tree. To allow multiple root nodes, add the `use_scope` parameter in the nested_set behavior tag.');
				}
			}
			$this->processNestedSetQueries($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				Pan_Db_TemplateDirectoryPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (Exception $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
				} else {
					$this->doUpdate($con);
				}
				$affectedRows += 1;
				$this->resetModified();
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Insert the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @throws     PropelException
	 * @see        doSave()
	 */
	protected function doInsert(PropelPDO $con)
	{
		$modifiedColumns = array();
		$index = 0;


		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY)) {
			$modifiedColumns[':p' . $index++]  = '`ID_TEMPLATE_DIRECTORY`';
		}
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL)) {
			$modifiedColumns[':p' . $index++]  = '`NODE_LEVEL`';
		}
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::NODE_LEFT)) {
			$modifiedColumns[':p' . $index++]  = '`NODE_LEFT`';
		}
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::NODE_RIGHT)) {
			$modifiedColumns[':p' . $index++]  = '`NODE_RIGHT`';
		}
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::NAME)) {
			$modifiedColumns[':p' . $index++]  = '`NAME`';
		}

		$sql = sprintf(
			'INSERT INTO `' .  _DB_PREFIX_ . 'template_directory` (%s) VALUES (%s)',
			implode(', ', $modifiedColumns),
			implode(', ', array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);
			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case '`ID_TEMPLATE_DIRECTORY`':
						$stmt->bindValue($identifier, $this->id_template_directory, PDO::PARAM_INT);
						break;
					case '`NODE_LEVEL`':
						$stmt->bindValue($identifier, $this->node_level, PDO::PARAM_INT);
						break;
					case '`NODE_LEFT`':
						$stmt->bindValue($identifier, $this->node_left, PDO::PARAM_INT);
						break;
					case '`NODE_RIGHT`':
						$stmt->bindValue($identifier, $this->node_right, PDO::PARAM_INT);
						break;
					case '`NAME`':
						$stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
		}

		$this->setNew(false);
	}

	/**
	 * Update the row in the database.
	 *
	 * @param      PropelPDO $con
	 *
	 * @see        doSave()
	 */
	protected function doUpdate(PropelPDO $con)
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();
		BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
	}

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = Pan_Db_TemplateDirectoryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Pan_Db_TemplateDirectoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getIdTemplateDirectory();
				break;
			case 1:
				return $this->getNodeLevel();
				break;
			case 2:
				return $this->getNodeLeft();
				break;
			case 3:
				return $this->getNodeRight();
				break;
			case 4:
				return $this->getName();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
	{
		if (isset($alreadyDumpedObjects['Pan_Db_TemplateDirectory'][serialize($this->getPrimaryKey())])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Pan_Db_TemplateDirectory'][serialize($this->getPrimaryKey())] = true;
		$keys = Pan_Db_TemplateDirectoryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdTemplateDirectory(),
			$keys[1] => $this->getNodeLevel(),
			$keys[2] => $this->getNodeLeft(),
			$keys[3] => $this->getNodeRight(),
			$keys[4] => $this->getName(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = Pan_Db_TemplateDirectoryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setIdTemplateDirectory($value);
				break;
			case 1:
				$this->setNodeLevel($value);
				break;
			case 2:
				$this->setNodeLeft($value);
				break;
			case 3:
				$this->setNodeRight($value);
				break;
			case 4:
				$this->setName($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = Pan_Db_TemplateDirectoryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdTemplateDirectory($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNodeLevel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNodeLeft($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNodeRight($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setName($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);

		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY)) $criteria->add(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $this->id_template_directory);
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL)) $criteria->add(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $this->node_level);
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::NODE_LEFT)) $criteria->add(Pan_Db_TemplateDirectoryPeer::NODE_LEFT, $this->node_left);
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::NODE_RIGHT)) $criteria->add(Pan_Db_TemplateDirectoryPeer::NODE_RIGHT, $this->node_right);
		if ($this->isColumnModified(Pan_Db_TemplateDirectoryPeer::NAME)) $criteria->add(Pan_Db_TemplateDirectoryPeer::NAME, $this->name);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME);
		$criteria->add(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $this->id_template_directory);
		$criteria->add(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $this->node_level);

		return $criteria;
	}

	/**
	 * Returns the composite primary key for this object.
	 * The array elements will be in same order as specified in XML.
	 * @return     array
	 */
	public function getPrimaryKey()
	{
		$pks = array();
		$pks[0] = $this->getIdTemplateDirectory();
		$pks[1] = $this->getNodeLevel();

		return $pks;
	}

	/**
	 * Set the [composite] primary key.
	 *
	 * @param      array $keys The elements of the composite key (order must match the order in XML file).
	 * @return     void
	 */
	public function setPrimaryKey($keys)
	{
		$this->setIdTemplateDirectory($keys[0]);
		$this->setNodeLevel($keys[1]);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return (null === $this->getIdTemplateDirectory()) && (null === $this->getNodeLevel());
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Pan_Db_TemplateDirectory (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setIdTemplateDirectory($this->getIdTemplateDirectory());
		$copyObj->setNodeLevel($this->getNodeLevel());
		$copyObj->setNodeLeft($this->getNodeLeft());
		$copyObj->setNodeRight($this->getNodeRight());
		$copyObj->setName($this->getName());
		if ($makeNew) {
			$copyObj->setNew(true);
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Pan_Db_TemplateDirectory Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     Pan_Db_TemplateDirectoryPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new Pan_Db_TemplateDirectoryPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id_template_directory = null;
		$this->node_level = null;
		$this->node_left = null;
		$this->node_right = null;
		$this->name = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		// nested_set behavior
		$this->collNestedSetChildren = null;
		$this->aNestedSetParent = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(Pan_Db_TemplateDirectoryPeer::DEFAULT_STRING_FORMAT);
	}

	// nested_set behavior
	
	/**
	 * Execute queries that were saved to be run inside the save transaction
	 */
	protected function processNestedSetQueries($con)
	{
		foreach ($this->nestedSetQueries as $query) {
			$query['arguments'][]= $con;
			call_user_func_array($query['callable'], $query['arguments']);
		}
		$this->nestedSetQueries = array();
	}
	
	/**
	 * Proxy getter method for the left value of the nested set model.
	 * It provides a generic way to get the value, whatever the actual column name is.
	 *
	 * @return     int The nested set left value
	 */
	public function getLeftValue()
	{
		return $this->node_left;
	}
	
	/**
	 * Proxy getter method for the right value of the nested set model.
	 * It provides a generic way to get the value, whatever the actual column name is.
	 *
	 * @return     int The nested set right value
	 */
	public function getRightValue()
	{
		return $this->node_right;
	}
	
	/**
	 * Proxy getter method for the level value of the nested set model.
	 * It provides a generic way to get the value, whatever the actual column name is.
	 *
	 * @return     int The nested set level value
	 */
	public function getLevel()
	{
		return $this->node_level;
	}
	
	/**
	 * Proxy setter method for the left value of the nested set model.
	 * It provides a generic way to set the value, whatever the actual column name is.
	 *
	 * @param      int $v The nested set left value
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 */
	public function setLeftValue($v)
	{
		return $this->setNodeLeft($v);
	}
	
	/**
	 * Proxy setter method for the right value of the nested set model.
	 * It provides a generic way to set the value, whatever the actual column name is.
	 *
	 * @param      int $v The nested set right value
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 */
	public function setRightValue($v)
	{
		return $this->setNodeRight($v);
	}
	
	/**
	 * Proxy setter method for the level value of the nested set model.
	 * It provides a generic way to set the value, whatever the actual column name is.
	 *
	 * @param      int $v The nested set level value
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 */
	public function setLevel($v)
	{
		return $this->setNodeLevel($v);
	}
	
	/**
	 * Creates the supplied node as the root node.
	 *
	 * @return     Pan_Db_TemplateDirectory The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function makeRoot()
	{
		if ($this->getLeftValue() || $this->getRightValue()) {
			throw new PropelException('Cannot turn an existing node into a root node.');
		}
	
		$this->setLeftValue(1);
		$this->setRightValue(2);
		$this->setLevel(0);
		return $this;
	}
	
	/**
	 * Tests if onbject is a node, i.e. if it is inserted in the tree
	 *
	 * @return     bool
	 */
	public function isInTree()
	{
		return $this->getLeftValue() > 0 && $this->getRightValue() > $this->getLeftValue();
	}
	
	/**
	 * Tests if node is a root
	 *
	 * @return     bool
	 */
	public function isRoot()
	{
		return $this->isInTree() && $this->getLeftValue() == 1;
	}
	
	/**
	 * Tests if node is a leaf
	 *
	 * @return     bool
	 */
	public function isLeaf()
	{
		return $this->isInTree() &&  ($this->getRightValue() - $this->getLeftValue()) == 1;
	}
	
	/**
	 * Tests if node is a descendant of another node
	 *
	 * @param      Pan_Db_TemplateDirectory $node Propel node object
	 * @return     bool
	 */
	public function isDescendantOf($parent)
	{
		return $this->isInTree() && $this->getLeftValue() > $parent->getLeftValue() && $this->getRightValue() < $parent->getRightValue();
	}
	
	/**
	 * Tests if node is a ancestor of another node
	 *
	 * @param      Pan_Db_TemplateDirectory $node Propel node object
	 * @return     bool
	 */
	public function isAncestorOf($child)
	{
		return $child->isDescendantOf($this);
	}
	
	/**
	 * Tests if object has an ancestor
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     bool
	 */
	public function hasParent(PropelPDO $con = null)
	{
		return $this->getLevel() > 0;
	}
	
	/**
	 * Sets the cache for parent node of the current object.
	 * Warning: this does not move the current object in the tree.
	 * Use moveTofirstChildOf() or moveToLastChildOf() for that purpose
	 *
	 * @param      Pan_Db_TemplateDirectory $parent
	 * @return     Pan_Db_TemplateDirectory The current object, for fluid interface
	 */
	public function setParent($parent = null)
	{
		$this->aNestedSetParent = $parent;
		return $this;
	}
	
	/**
	 * Gets parent node for the current object if it exists
	 * The result is cached so further calls to the same method don't issue any queries
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     mixed 		Propel object if exists else false
	 */
	public function getParent(PropelPDO $con = null)
	{
		if ($this->aNestedSetParent === null && $this->hasParent()) {
			$this->aNestedSetParent = Pan_Db_TemplateDirectoryQuery::create()
				->ancestorsOf($this)
				->orderByLevel(true)
				->findOne($con);
		}
		return $this->aNestedSetParent;
	}
	
	/**
	 * Determines if the node has previous sibling
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     bool
	 */
	public function hasPrevSibling(PropelPDO $con = null)
	{
		if (!Pan_Db_TemplateDirectoryPeer::isValid($this)) {
			return false;
		}
		return Pan_Db_TemplateDirectoryQuery::create()
			->filterByNodeRight($this->getLeftValue() - 1)
			->count($con) > 0;
	}
	
	/**
	 * Gets previous sibling for the given node if it exists
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     mixed 		Propel object if exists else false
	 */
	public function getPrevSibling(PropelPDO $con = null)
	{
		return Pan_Db_TemplateDirectoryQuery::create()
			->filterByNodeRight($this->getLeftValue() - 1)
			->findOne($con);
	}
	
	/**
	 * Determines if the node has next sibling
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     bool
	 */
	public function hasNextSibling(PropelPDO $con = null)
	{
		if (!Pan_Db_TemplateDirectoryPeer::isValid($this)) {
			return false;
		}
		return Pan_Db_TemplateDirectoryQuery::create()
			->filterByNodeLeft($this->getRightValue() + 1)
			->count($con) > 0;
	}
	
	/**
	 * Gets next sibling for the given node if it exists
	 *
	 * @param      PropelPDO $con Connection to use.
	 * @return     mixed 		Propel object if exists else false
	 */
	public function getNextSibling(PropelPDO $con = null)
	{
		return Pan_Db_TemplateDirectoryQuery::create()
			->filterByNodeLeft($this->getRightValue() + 1)
			->findOne($con);
	}
	
	/**
	 * Clears out the $collNestedSetChildren collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 */
	public function clearNestedSetChildren()
	{
		$this->collNestedSetChildren = null;
	}
	
	/**
	 * Initializes the $collNestedSetChildren collection.
	 *
	 * @return     void
	 */
	public function initNestedSetChildren()
	{
		$this->collNestedSetChildren = new PropelObjectCollection();
		$this->collNestedSetChildren->setModel('Pan_Db_TemplateDirectory');
	}
	
	/**
	 * Adds an element to the internal $collNestedSetChildren collection.
	 * Beware that this doesn't insert a node in the tree.
	 * This method is only used to facilitate children hydration.
	 *
	 * @param      Pan_Db_TemplateDirectory $templateDirectory
	 *
	 * @return     void
	 */
	public function addNestedSetChild($templateDirectory)
	{
		if ($this->collNestedSetChildren === null) {
			$this->initNestedSetChildren();
		}
		if (!$this->collNestedSetChildren->contains($templateDirectory)) { // only add it if the **same** object is not already associated
			$this->collNestedSetChildren[]= $templateDirectory;
			$templateDirectory->setParent($this);
		}
	}
	
	/**
	 * Tests if node has children
	 *
	 * @return     bool
	 */
	public function hasChildren()
	{
		return ($this->getRightValue() - $this->getLeftValue()) > 1;
	}
	
	/**
	 * Gets the children of the given node
	 *
	 * @param      Criteria  $criteria Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     array     List of Pan_Db_TemplateDirectory objects
	 */
	public function getChildren($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNestedSetChildren || null !== $criteria) {
			if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
				// return empty collection
				$this->initNestedSetChildren();
			} else {
				$collNestedSetChildren = Pan_Db_TemplateDirectoryQuery::create(null, $criteria)
	  			->childrenOf($this)
	  			->orderByBranch()
					->find($con);
				if (null !== $criteria) {
					return $collNestedSetChildren;
				}
				$this->collNestedSetChildren = $collNestedSetChildren;
			}
		}
		return $this->collNestedSetChildren;
	}
	
	/**
	 * Gets number of children for the given node
	 *
	 * @param      Criteria  $criteria Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     int       Number of children
	 */
	public function countChildren($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNestedSetChildren || null !== $criteria) {
			if ($this->isLeaf() || ($this->isNew() && null === $this->collNestedSetChildren)) {
				return 0;
			} else {
				return Pan_Db_TemplateDirectoryQuery::create(null, $criteria)
					->childrenOf($this)
					->count($con);
			}
		} else {
			return count($this->collNestedSetChildren);
		}
	}
	
	/**
	 * Gets the first child of the given node
	 *
	 * @param      Criteria $query Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Pan_Db_TemplateDirectory objects
	 */
	public function getFirstChild($query = null, PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			return array();
		} else {
			return Pan_Db_TemplateDirectoryQuery::create(null, $query)
				->childrenOf($this)
				->orderByBranch()
				->findOne($con);
		}
	}
	
	/**
	 * Gets the last child of the given node
	 *
	 * @param      Criteria $query Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Pan_Db_TemplateDirectory objects
	 */
	public function getLastChild($query = null, PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			return array();
		} else {
			return Pan_Db_TemplateDirectoryQuery::create(null, $query)
				->childrenOf($this)
				->orderByBranch(true)
				->findOne($con);
		}
	}
	
	/**
	 * Gets the siblings of the given node
	 *
	 * @param      bool			$includeNode Whether to include the current node or not
	 * @param      Criteria $query Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 *
	 * @return     array 		List of Pan_Db_TemplateDirectory objects
	 */
	public function getSiblings($includeNode = false, $query = null, PropelPDO $con = null)
	{
		if($this->isRoot()) {
			return array();
		} else {
			 $query = Pan_Db_TemplateDirectoryQuery::create(null, $query)
					->childrenOf($this->getParent($con))
					->orderByBranch();
			if (!$includeNode) {
				$query->prune($this);
			}
			return $query->find($con);
		}
	}
	
	/**
	 * Gets descendants for the given node
	 *
	 * @param      Criteria $query Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Pan_Db_TemplateDirectory objects
	 */
	public function getDescendants($query = null, PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			return array();
		} else {
			return Pan_Db_TemplateDirectoryQuery::create(null, $query)
				->descendantsOf($this)
				->orderByBranch()
				->find($con);
		}
	}
	
	/**
	 * Gets number of descendants for the given node
	 *
	 * @param      Criteria $query Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     int 		Number of descendants
	 */
	public function countDescendants($query = null, PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			// save one query
			return 0;
		} else {
			return Pan_Db_TemplateDirectoryQuery::create(null, $query)
				->descendantsOf($this)
				->count($con);
		}
	}
	
	/**
	 * Gets descendants for the given node, plus the current node
	 *
	 * @param      Criteria $query Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Pan_Db_TemplateDirectory objects
	 */
	public function getBranch($query = null, PropelPDO $con = null)
	{
		return Pan_Db_TemplateDirectoryQuery::create(null, $query)
			->branchOf($this)
			->orderByBranch()
			->find($con);
	}
	
	/**
	 * Gets ancestors for the given node, starting with the root node
	 * Use it for breadcrumb paths for instance
	 *
	 * @param      Criteria $query Criteria to filter results.
	 * @param      PropelPDO $con Connection to use.
	 * @return     array 		List of Pan_Db_TemplateDirectory objects
	 */
	public function getAncestors($query = null, PropelPDO $con = null)
	{
		if($this->isRoot()) {
			// save one query
			return array();
		} else {
			return Pan_Db_TemplateDirectoryQuery::create(null, $query)
				->ancestorsOf($this)
				->orderByBranch()
				->find($con);
		}
	}
	
	/**
	 * Inserts the given $child node as first child of current
	 * The modifications in the current object and the tree
	 * are not persisted until the child object is saved.
	 *
	 * @param      Pan_Db_TemplateDirectory $child	Propel object for child node
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function addChild(Pan_Db_TemplateDirectory $child)
	{
		if ($this->isNew()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must not be new to accept children.');
		}
		$child->insertAsFirstChildOf($this);
		return $this;
	}
	
	/**
	 * Inserts the current node as first child of given $parent node
	 * The modifications in the current object and the tree
	 * are not persisted until the current object is saved.
	 *
	 * @param      Pan_Db_TemplateDirectory $parent	Propel object for parent node
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function insertAsFirstChildOf($parent)
	{
		if ($this->isInTree()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must not already be in the tree to be inserted. Use the moveToFirstChildOf() instead.');
		}
		$left = $parent->getLeftValue() + 1;
		// Update node properties
		$this->setLeftValue($left);
		$this->setRightValue($left + 1);
		$this->setLevel($parent->getLevel() + 1);
		// update the children collection of the parent
		$parent->addNestedSetChild($this);
	
		// Keep the tree modification query for the save() transaction
		$this->nestedSetQueries []= array(
			'callable'  => array('Pan_Db_TemplateDirectoryPeer', 'makeRoomForLeaf'),
			'arguments' => array($left, $this->isNew() ? null : $this)
		);
		return $this;
	}
	
	/**
	 * Inserts the current node as last child of given $parent node
	 * The modifications in the current object and the tree
	 * are not persisted until the current object is saved.
	 *
	 * @param      Pan_Db_TemplateDirectory $parent	Propel object for parent node
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function insertAsLastChildOf($parent)
	{
		if ($this->isInTree()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must not already be in the tree to be inserted. Use the moveToLastChildOf() instead.');
		}
		$left = $parent->getRightValue();
		// Update node properties
		$this->setLeftValue($left);
		$this->setRightValue($left + 1);
		$this->setLevel($parent->getLevel() + 1);
		// update the children collection of the parent
		$parent->addNestedSetChild($this);
	
		// Keep the tree modification query for the save() transaction
		$this->nestedSetQueries []= array(
			'callable'  => array('Pan_Db_TemplateDirectoryPeer', 'makeRoomForLeaf'),
			'arguments' => array($left, $this->isNew() ? null : $this)
		);
		return $this;
	}
	
	/**
	 * Inserts the current node as prev sibling given $sibling node
	 * The modifications in the current object and the tree
	 * are not persisted until the current object is saved.
	 *
	 * @param      Pan_Db_TemplateDirectory $sibling	Propel object for parent node
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function insertAsPrevSiblingOf($sibling)
	{
		if ($this->isInTree()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must not already be in the tree to be inserted. Use the moveToPrevSiblingOf() instead.');
		}
		$left = $sibling->getLeftValue();
		// Update node properties
		$this->setLeftValue($left);
		$this->setRightValue($left + 1);
		$this->setLevel($sibling->getLevel());
		// Keep the tree modification query for the save() transaction
		$this->nestedSetQueries []= array(
			'callable'  => array('Pan_Db_TemplateDirectoryPeer', 'makeRoomForLeaf'),
			'arguments' => array($left, $this->isNew() ? null : $this)
		);
		return $this;
	}
	
	/**
	 * Inserts the current node as next sibling given $sibling node
	 * The modifications in the current object and the tree
	 * are not persisted until the current object is saved.
	 *
	 * @param      Pan_Db_TemplateDirectory $sibling	Propel object for parent node
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function insertAsNextSiblingOf($sibling)
	{
		if ($this->isInTree()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must not already be in the tree to be inserted. Use the moveToNextSiblingOf() instead.');
		}
		$left = $sibling->getRightValue() + 1;
		// Update node properties
		$this->setLeftValue($left);
		$this->setRightValue($left + 1);
		$this->setLevel($sibling->getLevel());
		// Keep the tree modification query for the save() transaction
		$this->nestedSetQueries []= array(
			'callable'  => array('Pan_Db_TemplateDirectoryPeer', 'makeRoomForLeaf'),
			'arguments' => array($left, $this->isNew() ? null : $this)
		);
		return $this;
	}
	
	/**
	 * Moves current node and its subtree to be the first child of $parent
	 * The modifications in the current object and the tree are immediate
	 *
	 * @param      Pan_Db_TemplateDirectory $parent	Propel object for parent node
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function moveToFirstChildOf($parent, PropelPDO $con = null)
	{
		if (!$this->isInTree()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must be already in the tree to be moved. Use the insertAsFirstChildOf() instead.');
		}
		if ($parent->isDescendantOf($this)) {
			throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
		}
	
		$this->moveSubtreeTo($parent->getLeftValue() + 1, $parent->getLevel() - $this->getLevel() + 1, $con);
	
		return $this;
	}
	
	/**
	 * Moves current node and its subtree to be the last child of $parent
	 * The modifications in the current object and the tree are immediate
	 *
	 * @param      Pan_Db_TemplateDirectory $parent	Propel object for parent node
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function moveToLastChildOf($parent, PropelPDO $con = null)
	{
		if (!$this->isInTree()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must be already in the tree to be moved. Use the insertAsLastChildOf() instead.');
		}
		if ($parent->isDescendantOf($this)) {
			throw new PropelException('Cannot move a node as child of one of its subtree nodes.');
		}
	
		$this->moveSubtreeTo($parent->getRightValue(), $parent->getLevel() - $this->getLevel() + 1, $con);
	
		return $this;
	}
	
	/**
	 * Moves current node and its subtree to be the previous sibling of $sibling
	 * The modifications in the current object and the tree are immediate
	 *
	 * @param      Pan_Db_TemplateDirectory $sibling	Propel object for sibling node
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function moveToPrevSiblingOf($sibling, PropelPDO $con = null)
	{
		if (!$this->isInTree()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must be already in the tree to be moved. Use the insertAsPrevSiblingOf() instead.');
		}
		if ($sibling->isRoot()) {
			throw new PropelException('Cannot move to previous sibling of a root node.');
		}
		if ($sibling->isDescendantOf($this)) {
			throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
		}
	
		$this->moveSubtreeTo($sibling->getLeftValue(), $sibling->getLevel() - $this->getLevel(), $con);
	
		return $this;
	}
	
	/**
	 * Moves current node and its subtree to be the next sibling of $sibling
	 * The modifications in the current object and the tree are immediate
	 *
	 * @param      Pan_Db_TemplateDirectory $sibling	Propel object for sibling node
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Pan_Db_TemplateDirectory The current Propel object
	 */
	public function moveToNextSiblingOf($sibling, PropelPDO $con = null)
	{
		if (!$this->isInTree()) {
			throw new PropelException('A Pan_Db_TemplateDirectory object must be already in the tree to be moved. Use the insertAsNextSiblingOf() instead.');
		}
		if ($sibling->isRoot()) {
			throw new PropelException('Cannot move to next sibling of a root node.');
		}
		if ($sibling->isDescendantOf($this)) {
			throw new PropelException('Cannot move a node as sibling of one of its subtree nodes.');
		}
	
		$this->moveSubtreeTo($sibling->getRightValue() + 1, $sibling->getLevel() - $this->getLevel(), $con);
	
		return $this;
	}
	
	/**
	 * Move current node and its children to location $destLeft and updates rest of tree
	 *
	 * @param      int	$destLeft Destination left value
	 * @param      int	$levelDelta Delta to add to the levels
	 * @param      PropelPDO $con		Connection to use.
	 */
	protected function moveSubtreeTo($destLeft, $levelDelta, PropelPDO $con = null)
	{
		$left  = $this->getLeftValue();
		$right = $this->getRightValue();
	
		$treeSize = $right - $left +1;
	
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
	
		$con->beginTransaction();
		try {
			// make room next to the target for the subtree
			Pan_Db_TemplateDirectoryPeer::shiftRLValues($treeSize, $destLeft, null, $con);
	
			if ($left >= $destLeft) { // src was shifted too?
				$left += $treeSize;
				$right += $treeSize;
			}
	
			if ($levelDelta) {
				// update the levels of the subtree
				Pan_Db_TemplateDirectoryPeer::shiftLevel($levelDelta, $left, $right, $con);
			}
	
			// move the subtree to the target
			Pan_Db_TemplateDirectoryPeer::shiftRLValues($destLeft - $left, $left, $right, $con);
	
			// remove the empty room at the previous location of the subtree
			Pan_Db_TemplateDirectoryPeer::shiftRLValues(-$treeSize, $right + 1, null, $con);
	
			// update all loaded nodes
			Pan_Db_TemplateDirectoryPeer::updateLoadedNodes(null, $con);
	
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}
	
	/**
	 * Deletes all descendants for the given node
	 * Instance pooling is wiped out by this command,
	 * so existing Pan_Db_TemplateDirectory instances are probably invalid (except for the current one)
	 *
	 * @param      PropelPDO $con Connection to use.
	 *
	 * @return     int 		number of deleted nodes
	 */
	public function deleteDescendants(PropelPDO $con = null)
	{
		if($this->isLeaf()) {
			// save one query
			return;
		}
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$left = $this->getLeftValue();
		$right = $this->getRightValue();
		$con->beginTransaction();
		try {
			// delete descendant nodes (will empty the instance pool)
			$ret = Pan_Db_TemplateDirectoryQuery::create()
				->descendantsOf($this)
				->delete($con);
	
			// fill up the room that was used by descendants
			Pan_Db_TemplateDirectoryPeer::shiftRLValues($left - $right + 1, $right, null, $con);
	
			// fix the right value for the current node, which is now a leaf
			$this->setRightValue($left + 1);
	
			$con->commit();
		} catch (Exception $e) {
			$con->rollback();
			throw $e;
		}
	
		return $ret;
	}
	
	/**
	 * Returns a pre-order iterator for this node and its children.
	 *
	 * @return     RecursiveIterator
	 */
	public function getIterator()
	{
		return new NestedSetRecursiveIterator($this);
	}

} // Pan_Db_Propel_TemplateDirectory
