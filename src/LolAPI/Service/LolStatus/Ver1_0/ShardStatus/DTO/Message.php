<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO;

use LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO\Severity\SeverityInterface;

class Message
{
    /**
     * ID
     * @var int
     */
    private $id;

    /**
     * Author
     * @var string
     */
    private $author;

    /**
     * Content
     * @var string
     */
    private $content;

    /**
     * Created at
     * @var string
     */
    private $createdAt;

    /**
     * Severity
     * @var SeverityInterface
     */
    private $severity;

    /**
     * Translations
     * @var Translation[]
     */
    private $translations = array();

    /**
     * Updated at
     * @var string
     */
    private $updatedAt;

    function __construct($id, $author, $content, $createdAt, SeverityInterface $severity, array $translations, $updatedAt)
    {
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->severity = $severity;
        $this->translations = $translations;
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns ID
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns author
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Returns content
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns created_at
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Returns severity
     * @return SeverityInterface
     */
    public function getSeverity()
    {
        return $this->severity;
    }

    /**
     * Returns translations
     * @return Translation[]
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Returns true if message has translations
     * @return bool
     */
    public function hasTranslations()
    {
        return count($this->translations) > 0;
    }

    /**
     * Returns updated_at
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}