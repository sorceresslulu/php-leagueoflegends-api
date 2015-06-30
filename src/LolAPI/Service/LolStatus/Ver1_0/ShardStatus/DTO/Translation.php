<?php
namespace LolAPI\Service\LolStatus\Ver1_0\ShardStatus\DTO;

class Translation
{
    /**
     * Content
     * @var string
     */
    private $content;

    /**
     * Locale
     * @var string
     */
    private $locale;

    /**
     * Updated At
     * @var string
     */
    private $updatedAt;

    public function __construct($content, $locale, $updatedAt)
    {
        $this->content = $content;
        $this->locale = $locale;
        $this->updatedAt = $updatedAt;
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
     * Returns locale
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
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