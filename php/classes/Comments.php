<?php
/** Write  all accessors, mutators, and the constructor for the post class on Reddit
 *
 * Long comment need here:
 *
 * @author Zachary Spangler <zaspangler@gmail.com>
 * @version 1.0.0
 */

class Post implments \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;

	/**
	 * id for this Post, this is the primary key
	 * @var Uuid $postId
	 **/
	private $postId;

}

?>
