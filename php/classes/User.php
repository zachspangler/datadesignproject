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
	private $userId;
	/**
	 * email for this User, this will be input by the user
	 * @var string $userEmail
	 **/
	private $userEmail;
	/**
	 * username for this User, this will be the name displayed to the public
	 * @var string $userName
	 **/
	private $userName;
	/**
	 * this is the image that will be displayed next to the username, this can be null
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
	 * @param string
	 */
}

?>