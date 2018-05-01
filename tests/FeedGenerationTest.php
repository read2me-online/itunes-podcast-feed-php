<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 20:37
 */
declare(strict_types=1);
namespace iTunesPodcastFeed\Tests;

use iTunesPodcastFeed\FeedGenerator;
use PHPUnit\Framework\TestCase;

class FeedGenerationTest extends TestCase
{
    public function testGenerator(): void {
        $channel = ChannelTest::getChannel();
        $items = [ItemTest::getItem(), ItemTest::getItem()]; // multiple identical items just for the sake of testing
        $feed = new FeedGenerator($channel, ...$items);

        $this->assertNotEmpty($feed->getXml());
    }
}