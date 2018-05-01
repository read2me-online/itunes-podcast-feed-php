<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 19:33
 */
declare(strict_types=1);
namespace iTunesPodcastFeed;


interface FeedGenerator
{
    /**
     * FeedGenerator constructor.
     *
     * @param FeedConfig $config
     * @param Episode[] $episodes
     */
    public function __construct(FeedConfig $config, Episode ...$episodes);
}