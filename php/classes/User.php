<?php
/** Write  all accessors, mutators, and the constructor for the user class on Reddit
 *
 * Long comment need here:
 *
 * @author Zachary Spangler <zaspangler@gmail.com>
 * @version 1.0.0
 */

class User implments \JsonSerializable {
	use ValidateDate;

	/**
	 * id for this User, this is the primary key
	 * @var Uuid $userId
	 **/
	private
	$userId;
	/**
	 * email for this User, this will be input by the user
	 * @var string $userEmail
	 **/
	private
	$userEmail;
	/**
	 * username for this User, this will be the name displayed to the public
	 * @var string $userName
	 **/
	private
	$userName;
	/**
	 * this is the image that will be displayed next to the username, this can be null
	 * @var string $userImage
	 **/
	private
	$userImage;
	/**
	 * user hash will be used to store the password for this User
	 * @var string $userHash
	 **/
	private
	$userHash;
	/**
	 * user salt will be used to strengthen and further encrypt the users password
	 * @var string $userSalt
	 **/
	private
	$userSalt;
	/**
	 * activation token used only upon initial signup, this can be null
	 * @var string $userActivationToken
	 **/
	private
	$userActivationToken;

	/**
	 * constructor for this user
	 *
	 * @param string\Uuid $newUserId id of user or null if new user
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
	public
	function __construct($newUserId, $newuserEmail, $newUserName, $newUserImage, $newUserHash, $newUserSalt, $newUserActivation = null) {
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
	 * @return Uuid value of userId
	 **/
	public function getUserId() : Uuid {
		return ($this->userId)
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
		} catch (\InvalidArgumentException | \RangeException |\Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the userId
		public fu$this->userId = $uuid;
	}
}
?>