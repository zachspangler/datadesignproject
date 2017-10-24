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
 */

class Comments implements \JsonSerializable {
	use ValidateUuid;
	use ValidateDate;

	/**
	 * id for a particular comment; this is the primary key
	 * @var string Uuid $commentId
	 **/
	private $commentId;
	/**
	 * id for the post that the comment is tied back to; this is a foreign key
	 * @var string Uuid $commentPostId
	 **/
	private $commentPostId;
	/**
	 * this is the user making the comment; this is a foreign key
	 * @var string $commentUserId
	 **/
	private $commentUserId;
	/**
	 * this is the id for the comment on a comment; this is a foreign key
	 * @var string $commentCommentId
	 **/
	private $commentCommentId;
	/**
	 * this is the comment content
	 * @var string $postSubject
	 **/
	private $commentDetail;
	/**
	 * the date and time of the comment
	 * @var \DateTime|string|null $postDateTime
	 **/
	private $commentDateTime;
	/**
	 * constructor for this post
	 *
	 * @param string $commentId string that identifies number used to identify the comment
	 * @param string $commentPostId string that is identifier for the post the comment is made on
	 * @param string $commentUserId string that is identifier for the user creating the comment
	 * @param string $commentCommentId string that identifies the comment the comment is made on
	 * @param string $commentDetail string that provides the content of the comment
	 * @param \DateTime $commentDateTime datetime of when the post was created
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hits
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(string $commentId, string $commentPostId, string $commentUserId, string $commentCommentId, string $CommentDetail, \DateTime $commentDateTime) {
		try {
			$this->setCommentId($newCommentId);
			$this->setCommentPostId($newCommentPostId);
			$this->setCommentUserId($newCommentUserId);
			$this->setCommentCommentId($newCommentCommentId);
			$this->setCommentDetail($newCommentDetail);
			$this->setCommentDateTime($newCommentDateTime);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw (new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}
	/**
	 * accessor method for commentId
	 *
	 * @return string Uuid value of commentId
	 **/
	public function getCommentId() : Uuid {
		return ($this->commentId);
	}
	/**
	 * mutator method for commentId
	 *
	 * @param Uuid/string $newCommentId new value of
	 * @throws \RangeException if $newCommentId is not positive
	 * @throws \TypeError if $newCommentId is not a Uuid or string
	 **/
	public function setCommentId($newCommentId) : void {
		try {
			$uuid = self::validateUuid($newCommentId);
		} catch (\InvalidArgumentException | \RangeException |\Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the userId
		$this->commentId = $uuid;
	}
	/**
	 * accessor method for commentPostId
	 *
	 * @return string Uuid value of commentPostId
	 **/
	public function getCommentPostId() : Uuid {
		return ($this->commentPostId);
	}
	/**
	 * mutator method for commentPostId
	 *
	 * @param Uuid/string $newCommentPostId new value of
	 * @throws \RangeException if $newCommentPostId is not positive
	 * @throws \TypeError if $newCommentPostId not a Uuid or string
	 **/
	public function setCommentPostId($newCommentPostId) : void {
		try {
			$uuid = self::validateUuid($newCommentPostId);
		} catch (\InvalidArgumentException | \RangeException |\Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the userId
		$this->commentPostId = $uuid;
	}
	/**
	 * accessor method for commentUserId
	 *
	 * @return string Uuid value of commentUserId
	 **/
	public function getCommentUserId() : Uuid {
		return ($this->commentUserId);
	}
	/**
	 * mutator method for commentUserId
	 *
	 * @param Uuid/string $newCommentUserId new value of
	 * @throws \RangeException if $newCommentUserId is not positive
	 * @throws \TypeError if $newCommentUserId not a Uuid or string
	 **/
	public function setCommentUserId($newCommentUserId) : void {
		try {
			$uuid = self::validateUuid($newCommentUserId);
		} catch (\InvalidArgumentException | \RangeException |\Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the userId
		$this->$newCommentUserId = $uuid;
	}
	/**
	 * accessor method for commentCommentId
	 *
	 * @return string Uuid value of commentCommentId
	 **/
	public function getCommentCommentId() : Uuid {
		return ($this->commentCommentId);
	}
	/**
	 * mutator method for commentCommentId
	 *
	 * @param Uuid/string $newCommentCommentId new value of
	 * @throws \RangeException if $newCommentCommentId is not positive
	 * @throws \TypeError if $newCommentCommentId not a Uuid or string
	 **/
	public function setCommentCommentId($newCommentCommentId) : void {
		try {
			$uuid = self::validateUuid($newCommentCommentId);
		} catch (\InvalidArgumentException | \RangeException |\Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		//convert and store the userId
		$this->$newCommentCommentId = $uuid;
	}
	/**
	 * accessor method for commentDetail
	 *
	 * @return string value for commentDetail
	 **/
	public function getCommentDetail() : string {
		return($this->CommentDetail);
	}
	/**
	 * mutator method for commentDetail
	 *
	 * @param string $newCommentDetail new value of comment
	 * @throws \InvalidArgumentException if $newCommentDetail is not a string or insecure
	 * @throws \RangeException if $newCommentDetail is > 2000 characters
	 * @throws \TypeError if $newCommentDetail is not a string
	 **/
	public function setCommentDetail(string $newCommentDetail) : void {
		// verify the comment content is secure
		$newCommentDetail = trim($newCommentDetail);
		$newCommentDetail = filter_var($newCommentDetail, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newCommentDetail) === true) {
			throw(new \InvalidArgumentException("comment content is empty or insecure"));
		}
		// verify the comment content will fit in the database
		if(strlen($newCommentDetail) > 2000) {
			throw(new \RangeException("comment content is too large"));
		}
		// store the comment content
		$this->commentDetail = $newCommentDetail;
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
	 * mutator method for commentDateTime
	 *
	 * @param \DateTime|string|null $newCommentDateTime post date as a DateTime object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newCommentDateTime is not a valid object or string
	 * @throws \RangeException if $newCommentDateTime is a date that does not exist
	 **/
	public function setCommentDateTime($newCommentDateTime = null) : void {
		// if the date is null, use the current date and time
		if($newCommentDateTime === null) {
			$this->commentDateTime = new \DateTime();
			return;
		}
		// store the like date using the ValidateDate trait
		try {
			$newCommentDateTime = self::validateDateTime($newCommentDateTime);
		} catch(\InvalidArgumentException | \RangeException $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->commentDateTime = $newCommentDateTime;
	}
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
//		$fields["commentId"] = $this->commentId;
//		$fields["commentPostId"] = $this->commentPostId;
//		$fields["commentUserId"] = $this->commentUserId;
//		$fields["commentCommentId"] = $this->commentCommentId;
		//format the date so that the front end can consume it
		$fields["commentDateTime"] = round(floatval($this->commentDateTime->format("U.u")) * 1000);
		return($fields);
	}
}
?>
