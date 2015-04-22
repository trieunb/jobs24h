<?php namespace DTT\Sentry\Hashing;
/**
 * Part of the Sentry package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Sentry
 * @version    2.0.0
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011 - 2013, Cartalyst LLC
 * @link       http://cartalyst.com
 */

class Sha256Hasher extends BaseHasher implements HasherInterface {

	/**
	 * Salt Length
	 *
	 * @var int
	 */
	public static $saltLength = 16;

	/**
	 * Hash string.
	 *
	 * @param  string  $string
	 * @return string
	 */
	public static function hash($string)
	{
		// Create salt
		$salt = self::createSalt();

		return $salt.hash('sha256', $salt.$string);
	}

	/**
	 * Check string against hashed string.
	 *
	 * @param  string  $string
	 * @param  string  $hashedString
	 * @return bool
	 */
	public static function checkhash($string, $hashedString)
	{
		$salt = substr($hashedString, 0, self::$saltLength);

		return self::slowEquals(($salt.hash('sha256', $salt.$string)), $hashedString);
	}

}
