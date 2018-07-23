<?php
namespace Anikitina\DataDesign;
require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");
use Ramsey\Uuid\Uuid;

/**
 * Class Article that represents an article on a fitness blog that users can read and comment on
 *
 * @author Asya Nikitina <anikitina@cnm.edu>
 * @version 1.0.0
 **/

class Article
{
	// use an external package for UUID validation
	use ValidateUuid;

	/**
	 * article ID; this is the primary key
	 * @var Uuid $articleId
	 **/
	private $articleId;

	/**
	 * the author of the article (we assume that anyone can write an article)
	 * @var string $articleAuthor
	 **/
	private $articleAuthor;

	/**
	 * article category (there are currently eight different categories, but a list of categories is not fixed)
	 * @var string $articleCategory
	 **/
	private $articleCategory;

	/**
	 * the content of an article as plain text (no HTML tags)
	 * @var string $articleContent
	 **/
	private $articleContent;

	/**
	 * the date when the article was published on the blog
	 * @var string $articleDate
	 **/
	private $articleDate;

	/**
	 * the article title
	 * @var string $articleTitle
	 **/
	private $articleTitle;

	/**
	 * Article constructor
	 *
	 * @param Uuid $newArticleId
	 * @param string $newArticleAuthor
	 * @param string $newArticleCategory
	 * @param string $newArticleContent
	 * @param string $newArticleContent
	 * @param string $newArticleDate
	 * @param string $newArticleTitle
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/
	public function __construct($newArticleId, string $newArticleAuthor, string $newArticleCategory, string $newArticleContent, string $newArticleDate, string $newArticleTitle) {
		$this->setArticleId($newArticleId);
		$this->setArticleAuthor($newArticleAuthor);
		$this->setArticleCategory($newArticleCategory);
		$this->setArticleContent($newArticleContent);
		$this->setArticleDate($newArticleDate);
		$this->setArticleTitle($newArticleTitle);
	}

	/**
	 * accessor method for Article ID
	 *
	 * @return Uuid value of Article ID
	 **/
	public function getArticleId() : Uuid {
		return ($this->articleId);
	}

	/**
	 * mutator method for Article ID
	 *
	 * @param Uuid|string $newArticleId new value of article id
	 **/
	public function setArticleId($newArticleId) : void {
		try {
			$uuid = self::validateUuid($newArticleId);
		} catch (\InvalidArgumentException | \RangeException | \TypeError | \Exception $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// if no exceptions have been cought, assign a new uuid to user ID
		$this->articleId = $uuid;
	}

	/**
	 * accessor method for Article author
	 *
	 * @return string value of Article author
	 **/
	public function getArticleAuthor() : string {
		return ($this->articleAuthor);
	}

	/**
	 * mutator method for Article author
	 *
	 * @param string $newArticleAuthor new value of Article author
	 **/
	public function setArticleAuthor(string $newArticleAuthor) : void {
		// trim $newArticleAuthor
		$newArticleAuthor = trim($newArticleAuthor);
		// sanitize  and remove HTML tags and special characters
		// use flags to remove chars below ASCII 32 and above ASCII 127
		$safeArticleAuthor = filter_var(
			$newArticleAuthor,
			FILTER_SANITIZE_STRING,
			FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH
		);
		// make sure that all characters are English letters
		try {
			if (!ctype_alpha($safeArticleAuthor)) {
				throw new InvalidArgumentException();
			}
		} catch (InvalidArgumentException $e) {
		} catch (Exception $e) {
		} finally {
		}
		// if no exceptions have been cought, assign a new email address to user Eamil
		$this->$articleAuthor = $safeArticleAuthor;
	}

	/**
	 * accessor method for Article category
	 *
	 * @return string value of Article category
	 **/
	public function getArticleCategory() : string {
		return ($this->articleCategory);
	}

	/**
	 * mutator method for Article category
	 *
	 * @param string $newArticleCategory new value of Article category
	 **/
	public function setArticleCategory(string $newArticleCategory) {
		// validate and sanitize
		// if no exceptions have been thrown, assign a new value to Article category
		$this->articleCategory = $newArticleCategory;
	}

	/**
	 * accessor method for Article Content
	 *
	 * @return string value of Article Content
	 **/
	public function getArticleContent() : string {
		return ($this->articleContent);
	}

	/**
	 * mutator method for Article Content
	 *
	 * @param string $newArticleContent new value of Article Content
	 **/
	public function setArticleContent(string $newArticleContent) {
		// validate and sanitize
		// if no exceptions have been thrown, assign a new value to Article content
		$this->articleContent = $newArticleContent;
	}

	/**
	 * accessor method for Article Date
	 *
	 * @return string value of Article Date formatted accordingly
	 **/
	public function getArticleDate() : string {
		return ($this->articleDate);
	}

	/**
	 * mutator method for Article Date
	 *
	 * @param string $newArticleDate new value of Article Date as a string
	 **/
	public function setArticleDate(string $newArticleDate) {
		$this->articleDate = $newArticletDate;
	}

	/**
	 * accessor method for Article Title
	 *
	 * @return string value of Article Title
	 **/
	public function getArticleTitle() : string {
		return ($this->articleTitle);
	}

	public function setArticleTitle(string $newArticleTitle) {
		// validate and sanitize
		// if no exceptions have been thrown, assign a new value to Article Title
		$this->articleTitle = $newArticleTitle;
	}
}
