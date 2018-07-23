<?php
namespace Edu\Cnm\DataDesign;
use Ramsey\Uuid\Uuid;
use ValidateUuid;
require_once(dirname(__DIR__, 2) ."/vendor/autoload.php");

/**
 * Class User that represents a user of a certain fitness blog who posts her/his comment about an article she/he just read there
 *
 * @author Asya Nikitina <anikitina@cnm.edu>
 * @version 1.0.0
 **/

class User
{
	/**
	 * user ID; this is the primary key
	 * @var Uuid $userId
	 **/
	private $userId;

	/**
	 * user email address; this is a unique value (there shold be no two different users with the same email address)
	 * @var string $userEmail
	 **/
	private $userEmail;

	/**
	 * user password; it's stored as a string of characters
	 * @var string $userHash
	 **/
	private $userHash;

	/**
	 * full user name; it's stored as a string of characters
	 * @var string $userName
	 **/
	private $userName;

	/**
	 * User constructor
	 *
	 * @param string|Uuid $newTweetId id of this Tweet or null if a new Tweet
	 * @param string|Uuid $newTweetProfileId id of the Profile that sent this Tweet
	 * @param string $newTweetContent string containing actual tweet data
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/

	public function __construct()
	{
	}

	/**
	 * accessor method for user ID
	 *
	 * @return Uuid value of user ID
	 **/
	public function getUserId() : Uuid
	{
		return($this->userId);
	}

	/**
	 * mutator method for user ID
	 *
	 * @param Uuid|string $newUserId new value of user id
	 * @throws \RangeException if $newUserId is not positive (in case  a number was used as a parameter)
	 * @throws \TypeError if $newUserId is not a uuid or string
	 * @throws \Exception if some other exception occurs
	 **/
	public function setUserId($newUserId) : void
	{
		try {
			$uuid = self::validateUuid($newUserId);
		} catch (\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// if no exceptions have been cought, assign a new uuid to user ID
		// convert and store the user ID
		$this->userId = $uuid;
	}

	/**
	 * accessor method for user email address
	 *
	 * @return string value of user email
	 **/
	public function getUserEmail() : string
	{
		return($this->userEmail);
	}

	/**
	 * mutator method for user email
	 *
	 * @param string $newUserEmail new value of user email address
	 * @throws \InvalidArgumentException if $newUserEmail is not a string or insecure
	 * @throws \TypeError if $newUserEmail is not a string
	 **/
	public function setUserEmail($newUserEmail) : void
	{
		// validate if a function parameter is a valid email address
		try {
		} catch (Exception $e) {
		}

		if (filter_var($newUserEmail, FILTER_VALIDATE_EMAIL)) {
			echo("$newUserEmail is a valid email address");
		} else {
			echo("$newUserEmail is not a valid email address");
		}



		// if no exceptions have been cought, assign a new email address to user Eamil
		$this->userEmail = $newUserEmail;
	}

	/**
	 * accessor method for user password
	 *
	 * @return string value of user password
	 **/
	public function getUserHash() : string
	{
		return($this->userHash);
	}

	/**
	 * mutator method for user password
	 *
	 * @param string $newUserHash new value of user hash
	 * @throws \RangeException if $newUserHash is not positive (in case  a number was used as a parameter)
	 * @throws \TypeError if $newUserHash is not a uuid or string
	 * @throws \Exception if some other exception occurs
	 **/
	public function setUserHash($newUserHash)
	{
		// validate and sanitize

		// if no exceptions have been thrown, assign a new value to user password
		$this->userHash = $newUserHash;
	}

	/**
	 * accessor method for user name
	 *
	 * @return string value of user name
	 **/
	public function getUserName() : string
	{
		return($this->userName);
	}

	/**
	 * mutator method for user name
	 *
	 * @param string $newUserName new value of user name
	 * @throws \RangeException if $newUserNameh is not positive (in case  a number was used as a parameter)
	 * @throws \TypeError if $$newUserName is not a uuid or string
	 * @throws \Exception if some other exception occurs
	 **/
	public function setUserName($newUserName)
	{
		// validate and sanitize

		// if no exceptions have been thrown, assign a new value to user password
		$this->userName = $newUserName;
	}

	/**
	 * insert this User into mySQL
	 *
	 * @param \PDO $dbc database connection object
	 * @throws \PDOException in case of mySQL related errors
	 **/
	public function insertUser(\PDO $dbc): void {
		try {
			$query = "INSERT INTO user(userId, userEmail, userHash, userName)
                    VALUES (:userId, :userEmail, :userHash, :userName)";
			$stmt = $dbc->prepare($query);
			$stmt->bindParam(':userId', $this->userId->getBytes());
			$stmt->bindParam(':userEmail', $this->userEmail);
			$stmt->bindParam(':userHash', $hits->userHash);
			$stmt->bindParam(':userName', $this->userName);
			$stmt->execute();

			// disconect from the database
			$dbc = NULL;
		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo "Error: " .$error;
			return;
		}
	}

	/**
	 * update this User from mySQL where userId matches
	 *
	 * @param \PDO $dbc database connection object
	 * @throws \PDOException in case of mySQL related errors
	 **/
	public function updateUser(\PDO $dbc): void {
		try {
			$query = "UPDATE user SET userEmail = :userEmail,
                                    userHash = :userHash,
                                    userName = :userName WHERE userId = :userId";
			$stmt = $dbc->prepare($query);
			$stmt->bindParam(':userId', $this->userId->getBytes());
			$stmt->bindParam(':userEmail', $this->userEmail);
			$stmt->bindParam(':userHash', $hits->userHash);
			$stmt->bindParam(':userName', $this->userName);
			$stmt->execute();

			// disconect from the database
			$dbc = NULL;
		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo "Error: " .$error;
			exit;
		}
	}

	/**
	 * delet this User from mySQL where userId matches
	 *
	 * @param \PDO $dbc database connection object
	 * @throws \PDOException in case of mySQL related errors
	 **/
	public function deleteUser(\PDO $dbc): void {
		try {
			$query = "DELETE FROM user WHERE userId = :userId";
			$stmt = $dbc->prepare($query);
			$stmt->bindParam(':userId', $this->userId->getBytes());
			$stmt->execute();

			// disconect from the database
			$dbc = NULL;
		} catch (PDOException $e) {
			$error = $e->getMessage();
			echo "Error: " .$error;
			exit;
		}
	}




}
