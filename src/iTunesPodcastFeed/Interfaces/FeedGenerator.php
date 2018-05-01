<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 19:33
 */
declare(strict_types=1);
namespace iTunesPodcastFeed\Interfaces;


interface FeedGenerator extends Xml
{
    /**
     * FeedGenerator constructor.
     *
     * @param Channel $config
     * @param Item[] $episodes
     */
    public function __construct(Channel $config, Item ...$episodes);
}