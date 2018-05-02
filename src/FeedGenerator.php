<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 23:11
 */
declare(strict_types=1);
namespace iTunesPodcastFeed;

use iTunesPodcastFeed\Interfaces\Channel as ChannelInterface;
use iTunesPodcastFeed\Interfaces\FeedGenerator as FeedGeneratorInterface;
use iTunesPodcastFeed\Interfaces\Item as ItemInterface;

class FeedGenerator implements FeedGeneratorInterface
{
    /**
     * @var ChannelInterface
     */
    private $config;
    /**
     * @var ItemInterface[]
     */
    private $items;

    /**
     * FeedGenerator constructor.
     *
     * @param ChannelInterface $config
     * @param ItemInterface[] $items
     */
    public function __construct(ChannelInterface $config, ItemInterface ...$items)
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