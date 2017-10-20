<?php
namespace Edu\Cnm\DataDesign;

require_once(autoloader.php);
require_once(dirname(__DIR__, 2) . "../vendor/autoload.php");

use Ramsey\Uuid\Uuid;
/** Write  all accessors, mutators, and the constructor for the user class on Reddit
 *
 * Long comment need here:
 *
 * @author Zachary Spangler <zaspangler@gmail.com>
 * @version 1.0.0
 */

class Post implments \JsonSerializable {
	use ValidateUuid;
	use ValidateDate;

	/**
	 * id for a particular post; this is the primary key
	 * @var string Uuid $postId
	 **/
	private $postId;
	/**
	 * id for the user making the post which is tied back to the User class; this is the foreign key
	 * @var string Uuid $postUserId
	 **/
	private $postUserId;
	/**
	 * this is the title of the post that appears; this will be indexed to allow for quicker searches
	 * @var string $postTitle
	 **/
	private $postTitle;
	/**
	 * this is content of the post
	 * @var string $postDetail
	 **/
	private $postDetail;
	/**
	 * post subject is the topic the user hash will be used to store the password for this User, this can be null
	 * @var string $postSubject
	 **/
	private $postSubject;
	/**
	 * the location this user is posting about, this can be null
	 * @var string $postLocation;
	 **/
	private $postLocation;
	/**
	 * the date and time of the post
	 * @var \DateTime\string\null $postDateTime
	 **/
	private $postDateTime;
	/**
	 * constructor for this post
	 *
	 * @param string $postId string that identifies number used to identify the post
	 * @param string $postUserId string that is identifier for the user creating the post
	 * @param string $postTitle string that is the title of the post
	 * @param string $postDetail string that is the content of the post
	 * @param string $postSubject string that provides detail about the post subject
	 * @param string $postLocation string that provides detail about the location the post is about, may be null
	 * @param \DateTime $postDateTime datetime of when the post was created
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hits
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(string $postId, string $PostUserId, string $postTitle, string $postDetail, string $postSubject, string $postLocation, string $postDateTime) {
		try {
			$this->setPostId($newPostId);
			$this->setPostUserId($newUserPostId);
			$this->setPostTitle($newPostTitleId);
			$this->setPostDetail($newPostDetail);
			$this->setPostSubject($newPostSubject);
			$this->setPostLocation($newPostLocation);
			$this->setPostDateTime($newPostDateTime);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for postId
	 *
	 * @return string Uuid value of postId
	 **/
	public function getPostId() : Uuid {
		return ($this->postId);
	}
	/**
	 * mutator method for postId
	 *
	 * @param Uuid/string $newPostId new value of userId
	 * @throws \RangeException if $newPostId is not positive
	 * @throws \TypeError if $newPostId is not a Uuid or string
	 **/
	public function setPostId($newPostId) : void {
		try {
			$uuid = self::validateUuid($newPostId);
		} catch (\InvalidArgumentException | \RangeException |\Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the userId
		$this->postId = $uuid;
	}
	/**
	 * accessor method for postUserId
	 *
	 * @return Uuid\ value for postUserId
	 **/
	public function getPostUserId() : Uuid {
		return($this->postUserId);
	}
	/**
	 * mutator method for postUserId
	 *
	 * @param string | Uuid $newPostUserId new value of tweet profile id
	 * @throws \RangeException if $newPostUserId is not positive
	 * @throws \TypeError if $newPostUserId is not an integer
	 **/
	public function setPostUserId($newPostUserId) : void {
		try {
			$uuid = self::validateUuid($newPostUserId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0,$exception));
		}
		//convert and store the user id
		$this->userPostId = $uuid;
	}
	/**
	 * accessor method for postTitle
	 *
	 * @return string value for postTitle
	 **/
	public function getPostTitle() : string {
		return($this->postTitle);
	}
	/**
	 * mutator method for postTitle
	 *
	 * @param string $newPostTitle new value of post title
	 * @throws \InvalidArgumentException if $newPostTitle is not a string or insecure
	 * @throws \RangeException if $newPostTitle is > 100 characters
	 * @throws \TypeError if $newPostTitle is not a string
	 **/
	public function setPostTitle(string $newPostTitle) : void {
		// verify the post title is secure
		$newPostTitle = trim($newPostTitle);
		$newPostTitle = filter_var($newPostTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newPostTitle) === true) {
			throw(new \InvalidArgumentException("post title content is empty or insecure"));
		}
		// verify the post title will fit in the database
		if(strlen($newPostTitle) > 100) {
			throw(new \RangeException("post title content too large"));
		}
		// store the post title
		$this->postTitle = $newPostTitle;
	}
	/**
	 * accessor method for postDetail
	 *
	 * @return string value for postDetail
	 **/
	public function getPostDetail() : string {
		return($this->PostDetail);
	}
	/**
	 * mutator method for postDetail
	 *
	 * @param string $newPostDetail new value of post title
	 * @throws \InvalidArgumentException if $newPostDetail is not a string or insecure
	 * @throws \RangeException if $newPostDetail is > 6000 characters
	 * @throws \TypeError if $newPostDetail is not a string
	 **/
	public function setPostDetail(string $newPostDetail) : void {
		// verify the post content is secure
		$newPostDetail = trim($newPostDetail);
		$newPostDetail = filter_var($newPostDetail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newPostDetail) === true) {
			throw(new \InvalidArgumentException("post content is empty or insecure"));
		}
		// verify the post content will fit in the database
		if(strlen($newPostDetail) > 6000) {
			throw(new \RangeException("post content is too large"));
		}
		// store the post content
		$this->postDetail = $newPostDetail;
	}
	/**
	 * accessor for postSubject
	 *
	 * @return string value for postSubject
	 **/
	public function getPostSubject() : string {
		return($this->postSubject);
	}
	/**
	 * mutator method for postSubject
	 *
	 * @param string $newPostSubject new value of post title
	 * @throws \InvalidArgumentException if $newPostSubject is not a string or insecure
	 * @throws \RangeException if $newPostSubject is > 50 characters
	 * @throws \TypeError if $newPostSubject is not a string
	 **/
	public function setPostSubject(string $newPostSubject) : void {
		// verify the post subject is secure
		$newPostSubject = trim($newPostSubject);
		$newPostSubject = filter_var($newPostSubject, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newPostSubject) === true) {
			throw(new \InvalidArgumentException("post subject is empty or insecure"));
		}
		// verify the post subject will fit in the database
		if(strlen($newPostSubject) > 50) {
			throw(new \RangeException("post subject is too large"));
		}
		// store the post subject
		$this->postSubject = $newPostSubject;
	}
	/**
	 * accessor for postLocation
	 *
	 * @return string value for postLocation
	 **/
	public function getPostLocation() : string {
		return($this->postLocation);
	}
	/**
	 * mutator method for postLocation
	 *
	 * @param string $newPostLocation new value of post title
	 * @throws \InvalidArgumentException if $newPostLocation is not a string or insecure
	 * @throws \RangeException if $newPostLocation is > 50 characters
	 * @throws \TypeError if $newPostLocation is not a string
	 **/
	public function setPostSubject(string $newPostLocation) : void {
		// verify the post location is secure
		$newPostLocation = trim($newPostLocation);
		$newPostLocation = filter_var($newPostLocation, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newPostLocation) === true) {
			throw(new \InvalidArgumentException("post location is empty or insecure"));
		}
		// verify the post location will fit in the database
		if(strlen($newPostLocation) > 50) {
			throw(new \RangeException("post location is too large"));
		}
		// store the post location
		$this->postLocation = $newPostLocation;
	}
	/**
	 * accessor method for postDateTime
	 *
	 * @return \DateTime value of postDateTime
	 **/
	public function getPostDateTime() : \DateTime {
		return($this->postDateTime);
	}
	/**
	 * mutator method for postDateTime
	 *
	 * @param \DateTime|string|null $newPostDateTime post date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newPostDateTime is not a valid object or string
	 * @throws \RangeException if $newPostDateTime is a date that does not exist
	 **/
	public function setPostDateTime($newPostDateTime = null) : void {
		// if the date is null, use the current date and time
		if($newPostDateTime === null) {
			$this->postDateTime = new \DateTime();
			return;
		}
		// store the like date using the ValidateDate trait
		try {
			$newPostDateTime = self::validateDateTime($newPostDateTime);
		} catch(\InvalidArgumentException | \RangeException $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->postDateTime = $newPostDateTime;
	}
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["postId"] = $this->postId;
		$fields["postUserId"] = $this->postUserId;
		//format the date so that the front end can consume it
		$fields["postDateTime"] = round(floatval($this->postDateTime->format("U.u")) * 1000);
		return($fields);
	}
}
?>