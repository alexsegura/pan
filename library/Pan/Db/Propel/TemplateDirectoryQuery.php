<?php


/**
 * Base class that represents a query for the 'template_directory' table.
 *
 * 
 *
 * @method     Pan_Db_TemplateDirectoryQuery orderByIdTemplateDirectory($order = Criteria::ASC) Order by the id_template_directory column
 * @method     Pan_Db_TemplateDirectoryQuery orderByNodeLevel($order = Criteria::ASC) Order by the node_level column
 * @method     Pan_Db_TemplateDirectoryQuery orderByNodeLeft($order = Criteria::ASC) Order by the node_left column
 * @method     Pan_Db_TemplateDirectoryQuery orderByNodeRight($order = Criteria::ASC) Order by the node_right column
 * @method     Pan_Db_TemplateDirectoryQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method     Pan_Db_TemplateDirectoryQuery groupByIdTemplateDirectory() Group by the id_template_directory column
 * @method     Pan_Db_TemplateDirectoryQuery groupByNodeLevel() Group by the node_level column
 * @method     Pan_Db_TemplateDirectoryQuery groupByNodeLeft() Group by the node_left column
 * @method     Pan_Db_TemplateDirectoryQuery groupByNodeRight() Group by the node_right column
 * @method     Pan_Db_TemplateDirectoryQuery groupByName() Group by the name column
 *
 * @method     Pan_Db_TemplateDirectoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Pan_Db_TemplateDirectoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Pan_Db_TemplateDirectoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Pan_Db_TemplateDirectory findOne(PropelPDO $con = null) Return the first Pan_Db_TemplateDirectory matching the query
 * @method     Pan_Db_TemplateDirectory findOneOrCreate(PropelPDO $con = null) Return the first Pan_Db_TemplateDirectory matching the query, or a new Pan_Db_TemplateDirectory object populated from the query conditions when no match is found
 *
 * @method     Pan_Db_TemplateDirectory findOneByIdTemplateDirectory(int $id_template_directory) Return the first Pan_Db_TemplateDirectory filtered by the id_template_directory column
 * @method     Pan_Db_TemplateDirectory findOneByNodeLevel(int $node_level) Return the first Pan_Db_TemplateDirectory filtered by the node_level column
 * @method     Pan_Db_TemplateDirectory findOneByNodeLeft(int $node_left) Return the first Pan_Db_TemplateDirectory filtered by the node_left column
 * @method     Pan_Db_TemplateDirectory findOneByNodeRight(int $node_right) Return the first Pan_Db_TemplateDirectory filtered by the node_right column
 * @method     Pan_Db_TemplateDirectory findOneByName(string $name) Return the first Pan_Db_TemplateDirectory filtered by the name column
 *
 * @method     array findByIdTemplateDirectory(int $id_template_directory) Return Pan_Db_TemplateDirectory objects filtered by the id_template_directory column
 * @method     array findByNodeLevel(int $node_level) Return Pan_Db_TemplateDirectory objects filtered by the node_level column
 * @method     array findByNodeLeft(int $node_left) Return Pan_Db_TemplateDirectory objects filtered by the node_left column
 * @method     array findByNodeRight(int $node_right) Return Pan_Db_TemplateDirectory objects filtered by the node_right column
 * @method     array findByName(string $name) Return Pan_Db_TemplateDirectory objects filtered by the name column
 *
 * @package    propel.generator.pan.om
 */
abstract class Pan_Db_Propel_TemplateDirectoryQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of Pan_Db_Propel_TemplateDirectoryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'pan', $modelName = 'Pan_Db_TemplateDirectory', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Pan_Db_TemplateDirectoryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Pan_Db_TemplateDirectoryQuery) {
			return $criteria;
		}
		$query = new Pan_Db_TemplateDirectoryQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$id_template_directory, $node_level] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Pan_Db_TemplateDirectory|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Pan_Db_TemplateDirectoryPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplateDirectoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Pan_Db_TemplateDirectory A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_TEMPLATE_DIRECTORY`, `NODE_LEVEL`, `NODE_LEFT`, `NODE_RIGHT`, `NAME` FROM `' . _DB_PREFIX_ . 'template_directory` WHERE `ID_TEMPLATE_DIRECTORY` = :p0 AND `NODE_LEVEL` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Pan_Db_TemplateDirectory();
			$obj->hydrate($row);
			Pan_Db_TemplateDirectoryPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    Pan_Db_TemplateDirectory|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $key[1], Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}

		return $this;
	}

	/**
	 * Filter the query on the id_template_directory column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdTemplateDirectory(1234); // WHERE id_template_directory = 1234
	 * $query->filterByIdTemplateDirectory(array(12, 34)); // WHERE id_template_directory IN (12, 34)
	 * $query->filterByIdTemplateDirectory(array('min' => 12)); // WHERE id_template_directory > 12
	 * </code>
	 *
	 * @param     mixed $idTemplateDirectory The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function filterByIdTemplateDirectory($idTemplateDirectory = null, $comparison = null)
	{
		if (is_array($idTemplateDirectory) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY, $idTemplateDirectory, $comparison);
	}

	/**
	 * Filter the query on the node_level column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNodeLevel(1234); // WHERE node_level = 1234
	 * $query->filterByNodeLevel(array(12, 34)); // WHERE node_level IN (12, 34)
	 * $query->filterByNodeLevel(array('min' => 12)); // WHERE node_level > 12
	 * </code>
	 *
	 * @param     mixed $nodeLevel The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function filterByNodeLevel($nodeLevel = null, $comparison = null)
	{
		if (is_array($nodeLevel) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL, $nodeLevel, $comparison);
	}

	/**
	 * Filter the query on the node_left column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNodeLeft(1234); // WHERE node_left = 1234
	 * $query->filterByNodeLeft(array(12, 34)); // WHERE node_left IN (12, 34)
	 * $query->filterByNodeLeft(array('min' => 12)); // WHERE node_left > 12
	 * </code>
	 *
	 * @param     mixed $nodeLeft The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function filterByNodeLeft($nodeLeft = null, $comparison = null)
	{
		if (is_array($nodeLeft)) {
			$useMinMax = false;
			if (isset($nodeLeft['min'])) {
				$this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NODE_LEFT, $nodeLeft['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($nodeLeft['max'])) {
				$this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NODE_LEFT, $nodeLeft['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NODE_LEFT, $nodeLeft, $comparison);
	}

	/**
	 * Filter the query on the node_right column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNodeRight(1234); // WHERE node_right = 1234
	 * $query->filterByNodeRight(array(12, 34)); // WHERE node_right IN (12, 34)
	 * $query->filterByNodeRight(array('min' => 12)); // WHERE node_right > 12
	 * </code>
	 *
	 * @param     mixed $nodeRight The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function filterByNodeRight($nodeRight = null, $comparison = null)
	{
		if (is_array($nodeRight)) {
			$useMinMax = false;
			if (isset($nodeRight['min'])) {
				$this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NODE_RIGHT, $nodeRight['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($nodeRight['max'])) {
				$this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NODE_RIGHT, $nodeRight['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NODE_RIGHT, $nodeRight, $comparison);
	}

	/**
	 * Filter the query on the name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
	 * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $name The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Pan_Db_TemplateDirectoryPeer::NAME, $name, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Pan_Db_TemplateDirectory $templateDirectory Object to remove from the list of results
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function prune($templateDirectory = null)
	{
		if ($templateDirectory) {
			$this->addCond('pruneCond0', $this->getAliasedColName(Pan_Db_TemplateDirectoryPeer::ID_TEMPLATE_DIRECTORY), $templateDirectory->getIdTemplateDirectory(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(Pan_Db_TemplateDirectoryPeer::NODE_LEVEL), $templateDirectory->getNodeLevel(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
		}

		return $this;
	}

	// nested_set behavior
	
	/**
	 * Filter the query to restrict the result to descendants of an object
	 *
	 * @param     Pan_Db_TemplateDirectory $templateDirectory The object to use for descendant search
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function descendantsOf($templateDirectory)
	{
		return $this
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $templateDirectory->getLeftValue(), Criteria::GREATER_THAN)
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $templateDirectory->getRightValue(), Criteria::LESS_THAN);
	}
	
	/**
	 * Filter the query to restrict the result to the branch of an object.
	 * Same as descendantsOf(), except that it includes the object passed as parameter in the result
	 *
	 * @param     Pan_Db_TemplateDirectory $templateDirectory The object to use for branch search
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function branchOf($templateDirectory)
	{
		return $this
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $templateDirectory->getLeftValue(), Criteria::GREATER_EQUAL)
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $templateDirectory->getRightValue(), Criteria::LESS_EQUAL);
	}
	
	/**
	 * Filter the query to restrict the result to children of an object
	 *
	 * @param     Pan_Db_TemplateDirectory $templateDirectory The object to use for child search
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function childrenOf($templateDirectory)
	{
		return $this
			->descendantsOf($templateDirectory)
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEVEL_COL, $templateDirectory->getLevel() + 1, Criteria::EQUAL);
	}
	
	/**
	 * Filter the query to restrict the result to siblings of an object.
	 * The result does not include the object passed as parameter.
	 *
	 * @param     Pan_Db_TemplateDirectory $templateDirectory The object to use for sibling search
	 * @param      PropelPDO $con Connection to use.
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function siblingsOf($templateDirectory, PropelPDO $con = null)
	{
		if ($templateDirectory->isRoot()) {
			return $this->
				add(Pan_Db_TemplateDirectoryPeer::LEVEL_COL, '1<>1', Criteria::CUSTOM);
		} else {
			return $this
				->childrenOf($templateDirectory->getParent($con))
				->prune($templateDirectory);
		}
	}
	
	/**
	 * Filter the query to restrict the result to ancestors of an object
	 *
	 * @param     Pan_Db_TemplateDirectory $templateDirectory The object to use for ancestors search
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function ancestorsOf($templateDirectory)
	{
		return $this
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $templateDirectory->getLeftValue(), Criteria::LESS_THAN)
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::RIGHT_COL, $templateDirectory->getRightValue(), Criteria::GREATER_THAN);
	}
	
	/**
	 * Filter the query to restrict the result to roots of an object.
	 * Same as ancestorsOf(), except that it includes the object passed as parameter in the result
	 *
	 * @param     Pan_Db_TemplateDirectory $templateDirectory The object to use for roots search
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function rootsOf($templateDirectory)
	{
		return $this
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEFT_COL, $templateDirectory->getLeftValue(), Criteria::LESS_EQUAL)
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::RIGHT_COL, $templateDirectory->getRightValue(), Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order the result by branch, i.e. natural tree order
	 *
	 * @param     bool $reverse if true, reverses the order
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function orderByBranch($reverse = false)
	{
		if ($reverse) {
			return $this
				->addDescendingOrderByColumn(Pan_Db_TemplateDirectoryPeer::LEFT_COL);
		} else {
			return $this
				->addAscendingOrderByColumn(Pan_Db_TemplateDirectoryPeer::LEFT_COL);
		}
	}
	
	/**
	 * Order the result by level, the closer to the root first
	 *
	 * @param     bool $reverse if true, reverses the order
	 *
	 * @return    Pan_Db_TemplateDirectoryQuery The current query, for fluid interface
	 */
	public function orderByLevel($reverse = false)
	{
		if ($reverse) {
			return $this
				->addAscendingOrderByColumn(Pan_Db_TemplateDirectoryPeer::RIGHT_COL);
		} else {
			return $this
				->addDescendingOrderByColumn(Pan_Db_TemplateDirectoryPeer::RIGHT_COL);
		}
	}
	
	/**
	 * Returns the root node for the tree
	 *
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     Pan_Db_TemplateDirectory The tree root object
	 */
	public function findRoot($con = null)
	{
		return $this
			->addUsingAlias(Pan_Db_TemplateDirectoryPeer::LEFT_COL, 1, Criteria::EQUAL)
			->findOne($con);
	}
	
	/**
	 * Returns the tree of objects
	 *
	 * @param      PropelPDO $con	Connection to use.
	 *
	 * @return     mixed the list of results, formatted by the current formatter
	 */
	public function findTree($con = null)
	{
		return $this
			->orderByBranch()
			->find($con);
	}

} // Pan_Db_Propel_TemplateDirectoryQuery