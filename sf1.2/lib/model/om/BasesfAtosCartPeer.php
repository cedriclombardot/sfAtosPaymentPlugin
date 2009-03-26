<?php

/**
 * Base static class for performing query and update operations on the 'sf_atos_cart' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 03/26/09 18:38:56
 *
 * @package    plugins.sfAtosPaymentPlugin.lib.model.om
 */
abstract class BasesfAtosCartPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'propel';

	/** the table name for this class */
	const TABLE_NAME = 'sf_atos_cart';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'plugins.sfAtosPaymentPlugin.lib.model.sfAtosCart';

	/** The total number of columns. */
	const NUM_COLUMNS = 29;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'sf_atos_cart.ID';

	/** the column name for the AMOUNT field */
	const AMOUNT = 'sf_atos_cart.AMOUNT';

	/** the column name for the MERCHANT_ID field */
	const MERCHANT_ID = 'sf_atos_cart.MERCHANT_ID';

	/** the column name for the MERCHANT_LANGUAGE field */
	const MERCHANT_LANGUAGE = 'sf_atos_cart.MERCHANT_LANGUAGE';

	/** the column name for the MERCHANT_COUNTRY field */
	const MERCHANT_COUNTRY = 'sf_atos_cart.MERCHANT_COUNTRY';

	/** the column name for the TRANSACTION_ID field */
	const TRANSACTION_ID = 'sf_atos_cart.TRANSACTION_ID';

	/** the column name for the PAYMENT_MEANS field */
	const PAYMENT_MEANS = 'sf_atos_cart.PAYMENT_MEANS';

	/** the column name for the TRANSMISSION_DATE field */
	const TRANSMISSION_DATE = 'sf_atos_cart.TRANSMISSION_DATE';

	/** the column name for the PAYMENT_TIME field */
	const PAYMENT_TIME = 'sf_atos_cart.PAYMENT_TIME';

	/** the column name for the RESPONSE_CODE field */
	const RESPONSE_CODE = 'sf_atos_cart.RESPONSE_CODE';

	/** the column name for the PAYMENT_CERTIFICATE field */
	const PAYMENT_CERTIFICATE = 'sf_atos_cart.PAYMENT_CERTIFICATE';

	/** the column name for the AUTHORISATION_ID field */
	const AUTHORISATION_ID = 'sf_atos_cart.AUTHORISATION_ID';

	/** the column name for the CURRENCY_CODE field */
	const CURRENCY_CODE = 'sf_atos_cart.CURRENCY_CODE';

	/** the column name for the CARD_NUMBER field */
	const CARD_NUMBER = 'sf_atos_cart.CARD_NUMBER';

	/** the column name for the CVV_FLAG field */
	const CVV_FLAG = 'sf_atos_cart.CVV_FLAG';

	/** the column name for the CVV_RESPONSE_CODE field */
	const CVV_RESPONSE_CODE = 'sf_atos_cart.CVV_RESPONSE_CODE';

	/** the column name for the BANK_RESPONSE_CODE field */
	const BANK_RESPONSE_CODE = 'sf_atos_cart.BANK_RESPONSE_CODE';

	/** the column name for the COMPLEMENTARY_CODE field */
	const COMPLEMENTARY_CODE = 'sf_atos_cart.COMPLEMENTARY_CODE';

	/** the column name for the COMPLEMENTARY_INFO field */
	const COMPLEMENTARY_INFO = 'sf_atos_cart.COMPLEMENTARY_INFO';

	/** the column name for the RETURN_CONTEXT field */
	const RETURN_CONTEXT = 'sf_atos_cart.RETURN_CONTEXT';

	/** the column name for the CADDIE field */
	const CADDIE = 'sf_atos_cart.CADDIE';

	/** the column name for the LANGUAGE field */
	const LANGUAGE = 'sf_atos_cart.LANGUAGE';

	/** the column name for the CUSTOMER_ID field */
	const CUSTOMER_ID = 'sf_atos_cart.CUSTOMER_ID';

	/** the column name for the ORDER_ID field */
	const ORDER_ID = 'sf_atos_cart.ORDER_ID';

	/** the column name for the CUSTOMER_EMAIL field */
	const CUSTOMER_EMAIL = 'sf_atos_cart.CUSTOMER_EMAIL';

	/** the column name for the CUSTOMER_IP_ADDRESS field */
	const CUSTOMER_IP_ADDRESS = 'sf_atos_cart.CUSTOMER_IP_ADDRESS';

	/** the column name for the CAPTURE_DAY field */
	const CAPTURE_DAY = 'sf_atos_cart.CAPTURE_DAY';

	/** the column name for the CAPTURE_MODE field */
	const CAPTURE_MODE = 'sf_atos_cart.CAPTURE_MODE';

	/** the column name for the DATA field */
	const DATA = 'sf_atos_cart.DATA';

	/**
	 * An identiy map to hold any loaded instances of sfAtosCart objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array sfAtosCart[]
	 */
	public static $instances = array();

	/**
	 * The MapBuilder instance for this peer.
	 * @var        MapBuilder
	 */
	private static $mapBuilder = null;

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Amount', 'MerchantId', 'MerchantLanguage', 'MerchantCountry', 'TransactionId', 'PaymentMeans', 'TransmissionDate', 'PaymentTime', 'ResponseCode', 'PaymentCertificate', 'AuthorisationId', 'CurrencyCode', 'CardNumber', 'CvvFlag', 'CvvResponseCode', 'BankResponseCode', 'ComplementaryCode', 'ComplementaryInfo', 'ReturnContext', 'Caddie', 'Language', 'CustomerId', 'OrderId', 'CustomerEmail', 'CustomerIpAddress', 'CaptureDay', 'CaptureMode', 'Data', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'amount', 'merchantId', 'merchantLanguage', 'merchantCountry', 'transactionId', 'paymentMeans', 'transmissionDate', 'paymentTime', 'responseCode', 'paymentCertificate', 'authorisationId', 'currencyCode', 'cardNumber', 'cvvFlag', 'cvvResponseCode', 'bankResponseCode', 'complementaryCode', 'complementaryInfo', 'returnContext', 'caddie', 'language', 'customerId', 'orderId', 'customerEmail', 'customerIpAddress', 'captureDay', 'captureMode', 'data', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::AMOUNT, self::MERCHANT_ID, self::MERCHANT_LANGUAGE, self::MERCHANT_COUNTRY, self::TRANSACTION_ID, self::PAYMENT_MEANS, self::TRANSMISSION_DATE, self::PAYMENT_TIME, self::RESPONSE_CODE, self::PAYMENT_CERTIFICATE, self::AUTHORISATION_ID, self::CURRENCY_CODE, self::CARD_NUMBER, self::CVV_FLAG, self::CVV_RESPONSE_CODE, self::BANK_RESPONSE_CODE, self::COMPLEMENTARY_CODE, self::COMPLEMENTARY_INFO, self::RETURN_CONTEXT, self::CADDIE, self::LANGUAGE, self::CUSTOMER_ID, self::ORDER_ID, self::CUSTOMER_EMAIL, self::CUSTOMER_IP_ADDRESS, self::CAPTURE_DAY, self::CAPTURE_MODE, self::DATA, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'amount', 'merchant_id', 'merchant_language', 'merchant_country', 'transaction_id', 'payment_means', 'transmission_date', 'payment_time', 'response_code', 'payment_certificate', 'authorisation_id', 'currency_code', 'card_number', 'cvv_flag', 'cvv_response_code', 'bank_response_code', 'complementary_code', 'complementary_info', 'return_context', 'caddie', 'language', 'customer_id', 'order_id', 'customer_email', 'customer_ip_address', 'capture_day', 'capture_mode', 'data', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Amount' => 1, 'MerchantId' => 2, 'MerchantLanguage' => 3, 'MerchantCountry' => 4, 'TransactionId' => 5, 'PaymentMeans' => 6, 'TransmissionDate' => 7, 'PaymentTime' => 8, 'ResponseCode' => 9, 'PaymentCertificate' => 10, 'AuthorisationId' => 11, 'CurrencyCode' => 12, 'CardNumber' => 13, 'CvvFlag' => 14, 'CvvResponseCode' => 15, 'BankResponseCode' => 16, 'ComplementaryCode' => 17, 'ComplementaryInfo' => 18, 'ReturnContext' => 19, 'Caddie' => 20, 'Language' => 21, 'CustomerId' => 22, 'OrderId' => 23, 'CustomerEmail' => 24, 'CustomerIpAddress' => 25, 'CaptureDay' => 26, 'CaptureMode' => 27, 'Data' => 28, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'amount' => 1, 'merchantId' => 2, 'merchantLanguage' => 3, 'merchantCountry' => 4, 'transactionId' => 5, 'paymentMeans' => 6, 'transmissionDate' => 7, 'paymentTime' => 8, 'responseCode' => 9, 'paymentCertificate' => 10, 'authorisationId' => 11, 'currencyCode' => 12, 'cardNumber' => 13, 'cvvFlag' => 14, 'cvvResponseCode' => 15, 'bankResponseCode' => 16, 'complementaryCode' => 17, 'complementaryInfo' => 18, 'returnContext' => 19, 'caddie' => 20, 'language' => 21, 'customerId' => 22, 'orderId' => 23, 'customerEmail' => 24, 'customerIpAddress' => 25, 'captureDay' => 26, 'captureMode' => 27, 'data' => 28, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::AMOUNT => 1, self::MERCHANT_ID => 2, self::MERCHANT_LANGUAGE => 3, self::MERCHANT_COUNTRY => 4, self::TRANSACTION_ID => 5, self::PAYMENT_MEANS => 6, self::TRANSMISSION_DATE => 7, self::PAYMENT_TIME => 8, self::RESPONSE_CODE => 9, self::PAYMENT_CERTIFICATE => 10, self::AUTHORISATION_ID => 11, self::CURRENCY_CODE => 12, self::CARD_NUMBER => 13, self::CVV_FLAG => 14, self::CVV_RESPONSE_CODE => 15, self::BANK_RESPONSE_CODE => 16, self::COMPLEMENTARY_CODE => 17, self::COMPLEMENTARY_INFO => 18, self::RETURN_CONTEXT => 19, self::CADDIE => 20, self::LANGUAGE => 21, self::CUSTOMER_ID => 22, self::ORDER_ID => 23, self::CUSTOMER_EMAIL => 24, self::CUSTOMER_IP_ADDRESS => 25, self::CAPTURE_DAY => 26, self::CAPTURE_MODE => 27, self::DATA => 28, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'amount' => 1, 'merchant_id' => 2, 'merchant_language' => 3, 'merchant_country' => 4, 'transaction_id' => 5, 'payment_means' => 6, 'transmission_date' => 7, 'payment_time' => 8, 'response_code' => 9, 'payment_certificate' => 10, 'authorisation_id' => 11, 'currency_code' => 12, 'card_number' => 13, 'cvv_flag' => 14, 'cvv_response_code' => 15, 'bank_response_code' => 16, 'complementary_code' => 17, 'complementary_info' => 18, 'return_context' => 19, 'caddie' => 20, 'language' => 21, 'customer_id' => 22, 'order_id' => 23, 'customer_email' => 24, 'customer_ip_address' => 25, 'capture_day' => 26, 'capture_mode' => 27, 'data' => 28, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, )
	);

	/**
	 * Get a (singleton) instance of the MapBuilder for this peer class.
	 * @return     MapBuilder The map builder for this peer
	 */
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new sfAtosCartMapBuilder();
		}
		return self::$mapBuilder;
	}
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
	 * @param      string $column The column name for current table. (i.e. sfAtosCartPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(sfAtosCartPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      criteria object containing the columns to add.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfAtosCartPeer::ID);

		$criteria->addSelectColumn(sfAtosCartPeer::AMOUNT);

		$criteria->addSelectColumn(sfAtosCartPeer::MERCHANT_ID);

		$criteria->addSelectColumn(sfAtosCartPeer::MERCHANT_LANGUAGE);

		$criteria->addSelectColumn(sfAtosCartPeer::MERCHANT_COUNTRY);

		$criteria->addSelectColumn(sfAtosCartPeer::TRANSACTION_ID);

		$criteria->addSelectColumn(sfAtosCartPeer::PAYMENT_MEANS);

		$criteria->addSelectColumn(sfAtosCartPeer::TRANSMISSION_DATE);

		$criteria->addSelectColumn(sfAtosCartPeer::PAYMENT_TIME);

		$criteria->addSelectColumn(sfAtosCartPeer::RESPONSE_CODE);

		$criteria->addSelectColumn(sfAtosCartPeer::PAYMENT_CERTIFICATE);

		$criteria->addSelectColumn(sfAtosCartPeer::AUTHORISATION_ID);

		$criteria->addSelectColumn(sfAtosCartPeer::CURRENCY_CODE);

		$criteria->addSelectColumn(sfAtosCartPeer::CARD_NUMBER);

		$criteria->addSelectColumn(sfAtosCartPeer::CVV_FLAG);

		$criteria->addSelectColumn(sfAtosCartPeer::CVV_RESPONSE_CODE);

		$criteria->addSelectColumn(sfAtosCartPeer::BANK_RESPONSE_CODE);

		$criteria->addSelectColumn(sfAtosCartPeer::COMPLEMENTARY_CODE);

		$criteria->addSelectColumn(sfAtosCartPeer::COMPLEMENTARY_INFO);

		$criteria->addSelectColumn(sfAtosCartPeer::RETURN_CONTEXT);

		$criteria->addSelectColumn(sfAtosCartPeer::CADDIE);

		$criteria->addSelectColumn(sfAtosCartPeer::LANGUAGE);

		$criteria->addSelectColumn(sfAtosCartPeer::CUSTOMER_ID);

		$criteria->addSelectColumn(sfAtosCartPeer::ORDER_ID);

		$criteria->addSelectColumn(sfAtosCartPeer::CUSTOMER_EMAIL);

		$criteria->addSelectColumn(sfAtosCartPeer::CUSTOMER_IP_ADDRESS);

		$criteria->addSelectColumn(sfAtosCartPeer::CAPTURE_DAY);

		$criteria->addSelectColumn(sfAtosCartPeer::CAPTURE_MODE);

		$criteria->addSelectColumn(sfAtosCartPeer::DATA);

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
		$criteria->setPrimaryTableName(sfAtosCartPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			sfAtosCartPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(sfAtosCartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}


    foreach (sfMixer::getCallables('BasesfAtosCartPeer:doCount:doCount') as $callable)
    {
      call_user_func($callable, 'BasesfAtosCartPeer', $criteria, $con);
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
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     sfAtosCart
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = sfAtosCartPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return sfAtosCartPeer::populateObjects(sfAtosCartPeer::doSelectStmt($criteria, $con));
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

    foreach (sfMixer::getCallables('BasesfAtosCartPeer:doSelectStmt:doSelectStmt') as $callable)
    {
      call_user_func($callable, 'BasesfAtosCartPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(sfAtosCartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			sfAtosCartPeer::addSelectColumns($criteria);
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
	 * @param      sfAtosCart $value A sfAtosCart object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(sfAtosCart $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
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
	 * @param      mixed $value A sfAtosCart object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof sfAtosCart) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or sfAtosCart object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	 * @return     sfAtosCart Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
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
		if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
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
		$cls = sfAtosCartPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = sfAtosCartPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = sfAtosCartPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://propel.phpdb.org/trac/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				sfAtosCartPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}

  static public function getUniqueColumnNames()
  {
    return array(array('transaction_id'), array('authorisation_id'), array('order_id'));
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
	 * The class that the Peer will make instances of.
	 *
	 * This uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass()
	{
		return sfAtosCartPeer::CLASS_DEFAULT;
	}

	/**
	 * Method perform an INSERT on the database, given a sfAtosCart or Criteria object.
	 *
	 * @param      mixed $values Criteria or sfAtosCart object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAtosCartPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfAtosCartPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(sfAtosCartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from sfAtosCart object
		}

		if ($criteria->containsKey(sfAtosCartPeer::ID) && $criteria->keyContainsValue(sfAtosCartPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.sfAtosCartPeer::ID.')');
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

		
    foreach (sfMixer::getCallables('BasesfAtosCartPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfAtosCartPeer', $values, $con, $pk);
    }

    return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a sfAtosCart or Criteria object.
	 *
	 * @param      mixed $values Criteria or sfAtosCart object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{

    foreach (sfMixer::getCallables('BasesfAtosCartPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfAtosCartPeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(sfAtosCartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(sfAtosCartPeer::ID);
			$selectCriteria->add(sfAtosCartPeer::ID, $criteria->remove(sfAtosCartPeer::ID), $comparison);

		} else { // $values is sfAtosCart object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfAtosCartPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfAtosCartPeer', $values, $con, $ret);
    }

    return $ret;
  }

	/**
	 * Method to DELETE all rows from the sf_atos_cart table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(sfAtosCartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(sfAtosCartPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a sfAtosCart or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or sfAtosCart object or primary key or array of primary keys
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
			$con = Propel::getConnection(sfAtosCartPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			sfAtosCartPeer::clearInstancePool();

			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof sfAtosCart) {
			// invalidate the cache for this single object
			sfAtosCartPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else {
			// it must be the primary key



			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfAtosCartPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
				// we can invalidate the cache for this single object
				sfAtosCartPeer::removeInstanceFromPool($singleval);
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

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given sfAtosCart object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      sfAtosCart $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(sfAtosCart $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfAtosCartPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfAtosCartPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfAtosCartPeer::DATABASE_NAME, sfAtosCartPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfAtosCartPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     sfAtosCart
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = sfAtosCartPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(sfAtosCartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(sfAtosCartPeer::DATABASE_NAME);
		$criteria->add(sfAtosCartPeer::ID, $pk);

		$v = sfAtosCartPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(sfAtosCartPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(sfAtosCartPeer::DATABASE_NAME);
			$criteria->add(sfAtosCartPeer::ID, $pks, Criteria::IN);
			$objs = sfAtosCartPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BasesfAtosCartPeer

// This is the static code needed to register the MapBuilder for this table with the main Propel class.
//
// NOTE: This static code cannot call methods on the sfAtosCartPeer class, because it is not defined yet.
// If you need to use overridden methods, you can add this code to the bottom of the sfAtosCartPeer class:
//
// Propel::getDatabaseMap(sfAtosCartPeer::DATABASE_NAME)->addTableBuilder(sfAtosCartPeer::TABLE_NAME, sfAtosCartPeer::getMapBuilder());
//
// Doing so will effectively overwrite the registration below.

Propel::getDatabaseMap(BasesfAtosCartPeer::DATABASE_NAME)->addTableBuilder(BasesfAtosCartPeer::TABLE_NAME, BasesfAtosCartPeer::getMapBuilder());

