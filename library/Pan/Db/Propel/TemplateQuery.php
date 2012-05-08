<?php


/**
 * Base class that represents a query for the 'template' table.
 *
 * 
 *
 * @method     Pan_Db_TemplateQuery orderByIdTemplate($order = Criteria::ASC) Order by the id_template column
 * @method     Pan_Db_TemplateQuery orderByIdTemplateDirectory($order = Criteria::ASC) Order by the id_template_directory column
 * @method     Pan_Db_TemplateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     Pan_Db_TemplateQuery orderByContent($order = Criteria::ASC) Order by the content column
 *
 * @method     Pan_Db_TemplateQuery groupByIdTemplate() Group by the id_template column
 * @method     Pan_Db_TemplateQuery groupByIdTemplateDirectory() Group by the id_template_directory column
 * @method     Pan_Db_TemplateQuery groupByName() Group by the name column
 * @method     Pan_Db_TemplateQuery groupByContent() Group by the content column
 *
 * @method     Pan_Db_TemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     Pan_Db_TemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     Pan_Db_TemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     Pan_Db_Template findOne(PropelPDO $con = null) Return the first Pan_Db_Template matching the query
 * @method     Pan_Db_Template findOneOrCreate(PropelPDO $con = null) Return the first Pan_Db_Template matching the query, or a new Pan_Db_Template object populated from the query conditions when no match is found
 *
 * @method     Pan_Db_Template findOneByIdTemplate(int $id_template) Return the first Pan_Db_Template filtered by the id_template column
 * @method     Pan_Db_Template findOneByIdTemplateDirectory(int $id_template_directory) Return the first Pan_Db_Template filtered by the id_template_directory column
 * @method     Pan_Db_Template findOneByName(string $name) Return the first Pan_Db_Template filtered by the name column
 * @method     Pan_Db_Template findOneByContent(string $content) Return the first Pan_Db_Template filtered by the content column
 *
 * @method     array findByIdTemplate(int $id_template) Return Pan_Db_Template objects filtered by the id_template column
 * @method     array findByIdTemplateDirectory(int $id_template_directory) Return Pan_Db_Template objects filtered by the id_template_directory column
 * @method     array findByName(string $name) Return Pan_Db_Template objects filtered by the name column
 * @method     array findByContent(string $content) Return Pan_Db_Template objects filtered by the content column
 *
 * @package    propel.generator.pan.om
 */
abstract class Pan_Db_Propel_TemplateQuery extends ModelCriteria
{
	
	/**
	 * Initializes internal state of Pan_Db_Propel_TemplateQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'pan', $modelName = 'Pan_Db_Template', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new Pan_Db_TemplateQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    Pan_Db_TemplateQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof Pan_Db_TemplateQuery) {
			return $criteria;
		}
		$query = new Pan_Db_TemplateQuery();
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
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    Pan_Db_Template|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = Pan_Db_TemplatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(Pan_Db_TemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
	 * @return    Pan_Db_Template A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `ID_TEMPLATE`, `ID_TEMPLATE_DIRECTORY`, `NAME`, `CONTENT` FROM `' . _DB_PREFIX_ . 'template` WHERE `ID_TEMPLATE` = :p0';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new Pan_Db_Template();
			$obj->hydrate($row);
			Pan_Db_TemplatePeer::addInstanceToPool($obj, (string) $row[0]);
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
	 * @return    Pan_Db_Template|array|mixed the result, formatted by the current formatter
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
	 * $objs = $c->findPks(array(12, 56, 832), $con);
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
	 * @return    Pan_Db_TemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(Pan_Db_TemplatePeer::ID_TEMPLATE, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    Pan_Db_TemplateQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(Pan_Db_TemplatePeer::ID_TEMPLATE, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id_template column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByIdTemplate(1234); // WHERE id_template = 1234
	 * $query->filterByIdTemplate(array(12, 34)); // WHERE id_template IN (12, 34)
	 * $query->filterByIdTemplate(array('min' => 12)); // WHERE id_template > 12
	 * </code>
	 *
	 * @param     mixed $idTemplate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Pan_Db_TemplateQuery The current query, for fluid interface
	 */
	public function filterByIdTemplate($idTemplate = null, $comparison = null)
	{
		if (is_array($idTemplate) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(Pan_Db_TemplatePeer::ID_TEMPLATE, $idTemplate, $comparison);
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
	 * @return    Pan_Db_TemplateQuery The current query, for fluid interface
	 */
	public function filterByIdTemplateDirectory($idTemplateDirectory = null, $comparison = null)
	{
		if (is_array($idTemplateDirectory)) {
			$useMinMax = false;
			if (isset($idTemplateDirectory['min'])) {
				$this->addUsingAlias(Pan_Db_TemplatePeer::ID_TEMPLATE_DIRECTORY, $idTemplateDirectory['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idTemplateDirectory['max'])) {
				$this->addUsingAlias(Pan_Db_TemplatePeer::ID_TEMPLATE_DIRECTORY, $idTemplateDirectory['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(Pan_Db_TemplatePeer::ID_TEMPLATE_DIRECTORY, $idTemplateDirectory, $comparison);
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
	 * @return    Pan_Db_TemplateQuery The current query, for fluid interface
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
		return $this->addUsingAlias(Pan_Db_TemplatePeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the content column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByContent('fooValue');   // WHERE content = 'fooValue'
	 * $query->filterByContent('%fooValue%'); // WHERE content LIKE '%fooValue%'
	 * </code>
	 *
	 * @param     string $content The value to use as filter.
	 *              Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    Pan_Db_TemplateQuery The current query, for fluid interface
	 */
	public function filterByContent($content = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($content)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $content)) {
				$content = str_replace('*', '%', $content);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(Pan_Db_TemplatePeer::CONTENT, $content, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Pan_Db_Template $template Object to remove from the list of results
	 *
	 * @return    Pan_Db_TemplateQuery The current query, for fluid interface
	 */
	public function prune($template = null)
	{
		if ($template) {
			$this->addUsingAlias(Pan_Db_TemplatePeer::ID_TEMPLATE, $template->getIdTemplate(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

} // Pan_Db_Propel_TemplateQuery