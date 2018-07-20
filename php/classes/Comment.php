<?php
namespace Edu\Cnm\anikitina\DataDesign;
use Ramsey\Uuid\Uuid;


/**
 * Class Comment represents a comment that a user posted about a specific article on a fitness blog
 *
 * @author Asya Nikitina <anikitina@cnm.edu>
 * @version 1.0.0
 **/

class Comment
{
	// use an external package for UUID validation
	use ValidateUuid;

	/**
	 * comment ID; this is the primary key
	 * @var Uuid $commentId
	 **/
	private $commentId;

	/**
	 * the article Id that a user commented about (this is a foreign key)
	 * @var Uuid $commentArticleId
	 **/
	private $commentArticleId;

	/**
	 * the user ID who posted a comment about the article (this is a foreign key)
	 * @var Uuid $commentUserId
	 **/
	private $commentUserId;

	/**
	 * the content of a comment as plain text (no HTML tags)
	 * @var string $commentContent
	 **/
	private $commentContent;

	/**
	 * the date when the comment was posted on the blog
	 * @var string $commentDate
	 **/
	private $commentDate;

	/**
	 * Comment constructor
	 *
	 * @param Uuid $newCommentId
	 * @param Uuid $newCommentArticleId
	 * @param Uuid $newCommentUserId
	 * @param string $newCommentContent
	 * @param string $newCommentDate
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newCommentId, $newCommentArticleId, $newCommentUserId, string $newCommentContent, string $newCommentDate) {
		$this->setCommentId($newCommentId);
		$this->setCommentArticleId($newCommentArticleId);
		$this->setCommentUserId($newCommentUserId);
		$this->setCommentContent($newCommentContent);
		$this->setCommentDate($newCommentDate);
	}

	/**
	 * accessor method for comment ID
	 *
	 * @return Uuid value of comment ID
	 **/
	public function getCommentId() : Uuid {
		return ($this->commentId);
	}

	/**
	 * mutator method for comment ID
	 *
	 * @param Uuid|string $newArticleId new value of article id
	 **/
	public function setCommentId($newCommentID) : void {
		try {
			$uuid = self::validateUuid($newCommentID);
		} catch (\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// if no exceptions have been cought, assign a new uuid to user ID
		$this->commentId = $uuid;
	}

	/**
	 * accessor method for commentArticleId
	 *
	 * @return Uuid value of commentArticleId
	 **/
	public function getCommentArticleId() : Uuid {
		return ($this->commentArticleId);
	}

	/**
	 * mutator method for commentArticleId
	 *
	 * @param Uuid|string $newArticleId new value of article id
	 **/
	public function setCommentArticleId($newCommentArticleId) : void {
		try {
			$uuid = self::validateUuid($newCommentArticleId);
		} catch (\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// if no exceptions have been cought, assign a new uuid to user ID
		$this->commentArticleId = $uuid;
	}

	/**
	 * accessor method for commentUserId
	 *
	 * @return Uuid value of commentUserId
	 **/
	public function getCommentUserId() : Uuid {
		return ($this->commentUserId);
	}

	/**
	 * mutator method for commentUserId
	 *
	 * @param Uuid|string $newUserId new value of CommentUserId
	 **/
	public function setCommentUserId($newCommentUserId) : void {
		try {
			$uuid = self::validateUuid($newCommentUserId);
		} catch (\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// if no exceptions have been cought, assign a new uuid to user ID
		$this->commentUserId = $uuid;
	}

	/**
	 * accessor method for comment Content
	 *
	 * @return string value of comment Content
	 **/
	public function getCommentContent() : string {
		return ($this->commentContent);
	}

	/**
	 * mutator method for comment Content
	 *
	 * @param string $newArticleContent new value of Article Content
	 **/
	public function setCommentContent(string $newCommentContent) {
		// validate and sanitize
		// if no exceptions have been thrown, assign a new value to comment content
		$this->commentContent = $newCommentContent;
	}

	/**
	 * accessor method for comment Date
	 *
	 * @return string value of comment Date formatted accordingly
	 **/
	public function getCommentDate() : string {
		return ($this->commentDate);
	}

	/**
	 * mutator method for Comment Date
	 *
	 * @param string $newCommentDate new value of Comment Date as a string
	 **/
	public function setCommentDate(string $newCommentDate) {
		$this->commentDate = $newCommentDate;
	}
}
?>