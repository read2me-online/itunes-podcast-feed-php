<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 21:12
 */
declare(strict_types=1);
namespace iTunesPodcastFeed;

use iTunesPodcastFeed\Interfaces\Channel as ChannelInterface;
use iTunesPodcastFeed\Traits\RssEscape;

class Channel implements ChannelInterface
{
    use RssEscape;

    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $link;
    /**
     * @var string
     */
    private $author;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $image;
    /**
     * @var string
     */
    private $explicit;
    /**
     * @var iterable
     */
    private $categories;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $lang;
    /**
     * @var string
     */
    private $copyright;
    /**
     * @var int
     */
    private $ttl;

    public function __construct(
        string $title, string $link, string $author, string $email, string $image, bool $explicit,
        iterable $categories, string $description, string $lang, string $copyright, int $ttl
    ) {
        $this->title = $this->escape($title);
        $this->link = $link;
        $this->author = $author;
        $this->email = $email;
        $this->image = $image;
        $this->explicit = $explicit ? 'yes' : 'no';
        $this->categories = $categories;
        $this->description = $this->escape($description);
        $this->lang = $lang;
        $this->copyright = $copyright;
        $this->ttl = $ttl;
    }

    /**
     * @return string
     */
    public function getXml(): string
    {
        $template = file_get_contents(__DIR__ . '/templates/channel.xml');

        foreach (get_object_vars($this) as $propName => $propValue) {
            if ($propName == 'categories') {
                $template = str_replace('{{categories}}', $this->getCategories(), $template);
            } else {
                $template = str_replace(sprintf('{{%s}}', $propName), $propValue, $template);
            }
        }

        return $template;
    }

    private function getCategories(): string {
        $categories = [];

        foreach ($this->categories as $category) {
            $categories[] = sprintf('<itunes:category text="%s"/>', htmlspecialchars($category));
        }

        return implode("\n", $categories);
    }
}