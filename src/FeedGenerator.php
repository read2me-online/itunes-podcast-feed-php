<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 23:11
 */
declare(strict_types=1);
namespace iTunesPodcastFeed;

use iTunesPodcastFeed\Interfaces\Channel;
use iTunesPodcastFeed\Interfaces\FeedGenerator as FeedGeneratorInterface;
use iTunesPodcastFeed\Interfaces\Item;

class FeedGenerator implements FeedGeneratorInterface
{
    /**
     * @var Channel
     */
    private $config;
    /**
     * @var Item[]
     */
    private $items;

    /**
     * FeedGenerator constructor.
     *
     * @param Channel $config
     * @param Item[] $items
     */
    public function __construct(Channel $config, Item ...$items)
    {
        $this->config = $config;
        $this->items = $items;
    }

    /**
     * @return string
     */
    public function getXml(): string
    {
        $template = file_get_contents(__DIR__ . '/templates/feed.xml');
        $template = str_replace('{{channelMeta}}', $this->config->getXml(), $template);
        $itemsXml = '';

        foreach ($this->items as $item) {
            $itemsXml .= $item->getXml() . "\n";
        }

        $template = str_replace('{{items}}', $itemsXml, $template);

        return $template;
    }
}