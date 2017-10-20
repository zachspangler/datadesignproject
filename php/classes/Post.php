<?php
namespace Edu\Cnm\DataDesign;

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;
/** Write  all accessors, mutators, and the constructor for the user class on Reddit
 *
 * Long comment need here:
 *
 * @author Zachary Spangler <zaspangler@gmail.com>
 * @version 1.0.0
 */

class Post implments \JsonSerializable {
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
	 */
	public function getPostUserId() : Uuid {
		return($this->postUserId);
	}
	/**
	 * mutator method for postUserId
	 *
	 * @param string | Uuid $newPostUserId new value of tweet profile id
	 * @throws \RangeException if $newPostUserId is not positive
	 * @throws \TypeError if $newPostUserId is not an integer
	 */
	public function setPostUserId($newPostUserId) : void {
		try {
			$uuid = self::validateUuid($newPostUserId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0,$exception));
		}
		//convert and store the user id
		$this->userPostId = $uuid
	}
	/**
	 * accessor method for postTitle
	 *
	 * @return string value for postTitle
	 */
	public function getPostTitle() : string {
		return($this->postTitle)
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
		// verify the post title content is secure
		$newPostTitle = trim($newPostTitle);
		$newPostTitle = filter_var($newPostTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newPostTitle) === true) {
			throw(new \InvalidArgumentException("post title content is empty or insecure"));
		}
		// verify the tweet content will fit in the database
		if(strlen($newPostTitle) > 100) {
			throw(new \RangeException("post title content too large"));
		}
		// store the tweet content
		$this->postTitle = $newPostTitle;
	}
		/**
		 * accessor method for postDetail
		 *
		 * @return string value for postDetail
		 */
		public function getPostDetail() : string {
		return($this->PostDetail)
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
		// verify the tweet content will fit in the database
		if(strlen($newPostDetail) > 6000) {
			throw(new \RangeException("post content is too large"));
		}
		// store the tweet content
		$this->postDetail = $newPostDetail;
	}
}

?>