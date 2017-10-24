<?php
namespace Edu\Cnm\DataDesign;

require_once("autoloader.php");
require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");

use Ramsey\Uuid\Uuid;
/** Write  all accessors, mutators, and the constructor for the user class on Reddit
 *
 * Long comment need here:
 *
 * @author Zachary Spangler <zaspangler@gmail.com>
 * @version 1.0.0
 **/

class User implements \JsonSerializable {
	use ValidateUuid;

	/**
	 * id for this User; this is the primary key
	 * @var string Uuid $userId
	 **/
	private $userId;
	/**
	 * email for this User, this will be input by the user
	 * @var string $userEmail
	 **/
	private $userEmail;
	/**
	 * username for this User, this will be the name displayed to the public; this is a unique and indexed
	 * @var string $userName
	 **/
	private $userName;
	/**
	 * this is the image that will be displayed next to the username, this can be null; this is a unique and indexed
	 * @var string $userImage
	 **/
	private $userImage;
	/**
	 * user hash will be used to store the password for this User
	 * @var string $userHash
	 **/
	private $userHash;
	/**
	 * user salt will be used to strengthen and further encrypt the users password
	 * @var string $userSalt
	 **/
	private $userSalt;
	/**
	 * activation token used only upon initial signup, this can be null
	 * @var string $userActivationToken
	 **/
	private $userActivationToken;

	/**
	 * constructor for this user
	 *
	 * @param string $newUserId id of user or null if new user
	 * @param string $newuserEmail email of user to setup account
	 * @param string $newuserName screen name for user, this will be shown to the public for all tweets
	 * @param string $newuserImage image that will be displayed next to the username, this can be null if user does not upload an image
	 * @param string $newuserHash user hash will be used to store the password for this User
	 * @param string $newuserSalt salt will be used to strengthen and further encrypt the users password
	 * @param string $newuserActivationToken activation token used only upon initial signup, this can be null
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hits
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(?string $newUserId, string $newuserEmail, string $newUserName,  string$newUserImage, string $newUserHash, string $newUserSalt, string $newUserActivation = null) {
		try {
			$this->setUserId($newUserId);
			$this->setUserEmail($newuserEmail);
			$this->setUserName($newUserName);
			$this->setUserImage($newUserImage);
			$this->setUserHash($newUserHash);
			$this->setUserSalt($newUserSalt);
			$this->setUserActivationToken($newUserActivation);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
		/**
		 * accessor method for userId
		 *
		 * @return string Uuid value of userId
		 **/
		public function getUserId() : Uuid {
			return ($this->userId);
		}
		/**
		 * mutator method for userId
		 *
		 * @param Uuid/string $newUserId new value of userId
		 * @throws \RangeException if $newUserId is not positive
		 * @throws \TypeError if $newTweetId is not a Uuid or string
		 **/
		public function setUserId( $newUserId) : void {
			try {
				$uuid = self::validateUuid($newUserId);
			} catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
				$exceptionType = get_class($exception);
				throw(new $exceptionType($exception->getMessage(), 0, $exception));
			}
			//convert and store the userId
			$this->userId = $uuid;
		}
	/**
	 * accessor method for userEmail method
	 *
	 * @return string userEmail for the user
	 * */
	public function getuserEmail() : string{
		return($this->userEmail);
	}
	/**
	 * mutator method for userEmail
	 *
	 * @param string $newUserEmail new value of user's email address
	 * @throws \InvalidArgumentException if $newUserEmail is not a string or insecure
	 * @throws \TypeError if $newUserEmail is not a string
	 **/
	public function setUserEmail (string $newUserEmail) : void {
		//verify the email is secure
		$newUserEmail = trim($newUserEmail);
		$newUserEmail = filter_var($newUserEmail, FILTER_VALIDATE_EMAIL, FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newUserEmail) === true) {
			throw(new \InvalidArgumentException("user email is empty or insecure"));
		}
		//store the userEmail
		$this->userEmail = $newUserEmail;
	}
	/**
	 * accessor method for userName method
	 *
	 * @return string userName for the user
	 * */
	public function getuserName() : string{
		return($this->userName);
	}
	/**
	 * mutator method for userName
	 *
	 * @param string $newUserName new value of userName which is the screen name shown
	 * @throws \InvalidArgumentException if $newUserName is not a string or insecure
	 * @throws \TypeError if $newUserName is not a string
	 **/
	public function setUserName (string $newUserName) : void {
		//verify the userName is secure
		$newUserName = trim($newUserName);
		$newUserName = filter_var($newUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if (empty($newUserName) === true) {
			throw(new \InvalidArgumentException("Username is empty or insecure"));
		}
		//store the userName
		$this->userName = $newUserName;
	}
	/**
	 * accessor method for userImage
	 *
	 * @return string userImage for the users profile
	 **/
	public function getUserImage() :string {
		return ($this->userImage);
	}
	/**
	 * mutator method for userImage
	 *
	 * @param string $newUserImage new value of $newUserImage
	 * @throws \InvalidArgumentException if $newUserImage is not a string or insecure
	 * @throws \TypeError if $newUserImage is not a string
	 **/
	public function setUserImage(string $newUserImage) : void {
		//verify the tweet content is secure
		$newUserImage = trim($newUserImage);
		$newUserImage = filter_var($newUserImage,FILTER_SANITIZE_STRING,FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newUserImage) === true) {
			throw(new \InvalidArgumentException("image cannot be accepted"));
		}
		//store the image file
		$this->setUserImage = $newUserImage;
	}
	/**
	 * accessor method for userHash
	 *
	 * @returns string userHash is the value of encyrpted password
	 **/
	public function getUserHash() : string {
		return($this->userHash);
	}
	/**
	 * mutator method for userHash
	 *
	 * @param string $newUserHash
	 * @throws \InvalidArgumentException if $newUserHash is not a string or insecure
	 * @throws \RangeException if $newUserHash is not 128 characters
	 * @throws \TypeError if $newUserHash is not a string
	 **/
	public function setUserHash(string $newUserHash) : void {
		//verify the userHash is secure
		$newUserHash = trim($newUserHash);
		$newUserHash = strtolower($newUserHash);
		if(empty($newUserHash) === true) {
			throw(new \InvalidArgumentException("profile password has empty or insecure"));
		}
		//enforce the hash has exactly 128 characters
		if(strlen($newUserHash) !== 128) {
			throw(new \RangeException("profile hash must be 128 characters"));
		}
		//store the hash
		$this->userHash = $newUserHash;
	}
	/**
	 * accessor method for userSalt
	 *
	 * @returns string representation of the salt hexadecimal
	 **/
	public function getUserSalt() : string {
		return($this->userSalt);
	}
	/**
	 * mutator method for userSalt
	 *
	 * @param string $newUserSalt
	 * @throws \InvalidArgumentException if $newUserSalt is not a string or insecure
	 * @throws \RangeException if $newUserSalt is not 64 characters
	 * @throws \TypeError if $newUserSalt is not a string
	 **/
	public function setUserSalt(string $newUserSalt) : void {
		//verify the userSalt is secure
		$newUserSalt = trim($newUserSalt);
		$newUserSalt = strtolower($newUserSalt);
		//enforce that the slat is a string representation of a hexadecimal
		if(!ctype_xdigit($newUserSalt)) {
			throw(new \InvalidArgumentException("prfile password salt is empty of insure"));
		}
		//enforce that the salt is exactly 64 characters
		if(strlen($newUserSalt) !== 64) {
			throw(new \RangeException("profile salt must be 128 characters"));
		}
		//store the hash
		$this->profileSalt = $newUserSalt;
	}
	/**
	 * accessor method for userActivationToken
	 *
	 * @returns string userActivationToken value to confirm user
	 **/
	public function getUserActivationToken() : string {
		return($this->userActivationToken);
	}
	/**
	 * mutator method for userActivationToken
	 *
	 * @param string $newUserActivationToken
	 * @throws \InvalidArgumentException if $newUserActivationToken is not a string or insecure
	 * @throws \RangeException if $newUserActivationToken is not exactly 32 characters
	 * @throws \TypeError if $newUserActivationToken is not a string
	 **/
	public function setUserActivationToken(string $newUserActivationToken) : void {
		if($newUserActivationToken = null) {
			$this->userActivationToken = null;
			return;
		}
		$newUserActivationToken = strtolower(trim($newUserActivationToken));
		if(ctype_xdigit($newUserActivationToken) === false) {
			throw(new\RangeException("user activation is not valid"));
		}
		//make sure user activation token is only 32 characters
		if(strlen($newUserActivationToken) !== 32) {
			throw(new\RangeException("user activation token has to be 32"));
		}
		$this->userActivationToken;
	}
	/**
	 * inserts this user into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo): void {
		// enforce the userId is null (i.e., don't insert a profile that already exists)
		if($this->userId !== null) {
			throw(new \PDOException("not a new profile"));
		}
		// create query template
		$query = "INSERT INTO users(userId, userEmail, userName, userImage, userHash, userSalt, userActivationToken) VALUES (:userId, :userEmail, :userName, :userImage, :userHash, :userSalt, :userActivationToken)";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holders in the template
		$parameters = ["userId" => $this->userId, "userEmail" => $this->userEmail, "userName" => $this->userName, "userImage" => $this->userImage, "userHash" => $this->userHash, "userSalt" => $this->userSalt, "userActivationToken" => $this->userActivationToken];
		$statement->execute($parameters);
		// update the null profileId with what mySQL just gave us
		$this->profileId = intval($pdo->lastInsertId());
	}
	/**
	 * deletes this User from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo): void {
		// enforce the profileId is not null (i.e., don't delete a profile that does not exist)
		if($this->userId === null) {
			throw(new \PDOException("unable to delete a profile that does not exist"));
		}
		// create query template
		$query = "DELETE FROM users WHERE userId = :userId";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holders in the template
		$parameters = ["userId" => $this->userId];
		$statement->execute($parameters);
	}
	/**
	 * updates this Profile from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo): void {
		// enforce the profileId is not null (i.e., don't update a profile that does not exist)
		if($this->userId === null) {
			throw(new \PDOException("unable to delete a profile that does not exist"));
		}
		// create query template
		$query = "UPDATE users SET userId = :userId,  userEmail = :userEmail, userName = :userName, userImage = :userImage, userHash = :userHash, userSalt = :userSalt, userActivationToken = :userActivationToken WHERE userId = :userId";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holders in the template
		$parameters = ["userId" => $this->userId, "userEmail" => $this->userEmail, "userName" => $this->userName, "userImage" => $this->userImage, "userHash" => $this->userHash, "userSalt" => $this->userSalt, "userActivationToken" => $this->userActivationToken];
		$statement->execute($parameters);
	}
	/**
	 * gets the user by userId
	 *
	 * @param \PDO $pdo $pdo PDO connection object
	 * @param string $userId user Id to search for
	 * @return User|null user or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getUserByUserId(\PDO $pdo, string $profileId):?User {
		// sanitize the user id before searching
		try {
			$userId = self::validateUuid($userId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT userId, userEmail, userName, userImage, userHash, userSalt, userActivationToken WHERE userId = :userId";
		$statement = $pdo->prepare($query);
		// bind the user id to the place holder in the template
		$parameters = ["userId" => $userId->getBytes()];
		$statement->execute($parameters);

		// grab the Profile from mySQL
		try {
			$user = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$user = new User($row["userId"], $row["userEmail"], $row["userName"], $row["userImage"], $row["userHash"], $row["userSalt"], $row["userActivationToken"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($user);
	}
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["userId"] = $this->userId->toString();
//		unset($fields["userHash"]);
//		unset($fields["userSalt"]);
		return ($fields);
	}
}
?>