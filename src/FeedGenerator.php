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
    private $episodes;

    /**
     * FeedGenerator constructor.
     *
     * @param Channel $config
     * @param Item[] $episodes
     */
    public function __construct(Channel $config, Item ...$episodes)
    {
        $this->config = $config;
        $this->episodes = $episodes;
    }

    /**
     * @return string
     */
    public function getXml(): string
    {
        // TODO: Implement getXml() method.
    }
}