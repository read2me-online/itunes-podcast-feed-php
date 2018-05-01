<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 23:13
 */
declare(strict_types=1);
namespace iTunesPodcastFeed;

use iTunesPodcastFeed\Interfaces\Item as ItemInterface;
use iTunesPodcastFeed\Traits\RssEscape;

class Item implements ItemInterface
{
    use RssEscape;

    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $fileUrl;
    /**
     * @var int
     */
    private $duration;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $publishDate;
    /**
     * @var int
     */
    private $fileSizeBytes;
    /**
     * @var string
     */
    private $mime;

    private static $template;

    public function __construct(
        string $title, string $fileUrl, string $duration,
        string $description, int $publishDate, int $fileSizeBytes, string $mime
    ) {
        $this->title = $this->escape($title);
        $this->fileUrl = $fileUrl;
        $this->duration = $duration;
        $this->description = $this->escape($description);
        $this->publishDate = date('r', $publishDate);
        $this->fileSizeBytes = $fileSizeBytes;
        $this->mime = $mime;

        if (empty(self::$template)) // avoid disk IO for every item instance
            self::$template = file_get_contents(__DIR__ . '/templates/item.xml');
    }

    public function getXml(): string {
        $template = self::$template;

        foreach (get_object_vars($this) as $propName => $propValue) {
            $template = str_replace(sprintf('{{%s}}', $propName), $propValue, $template);
        }

        return $template;
    }
}