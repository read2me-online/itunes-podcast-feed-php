<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 21:39
 */
declare(strict_types=1);
namespace iTunesPodcastFeed\Tests;

use iTunesPodcastFeed\Channel;
use PHPUnit\Framework\TestCase;

class ChannelTest extends TestCase
{
    private const Title = 'Read2Me Daily Curated Articles';
    private const Link = 'https://read2me.online';
    private const Author = 'NYTimes and Medium';
    private const Email = 'hello@read2me.online';
    private const Image = 'https://d22fip447qchhd.cloudfront.net/api/widget/static/images/android-chrome-1400x1400.png';
    private const Explicit = false;
    private const Categories = [
        'News',
        'Technology',
        'Culture',
        'Entrepreneurship',
        'Productivity'
    ]; // @TODO subcategory as a nested array element
    private const Description = 'Daily curated articles from New York Times and Medium';
    private const Lang = 'en';
    private const Copyright = 'The New York Times Company and The Medium Company';
    private const Ttl = 43200; // 12 hours in seconds

    public static function getChannel(): Channel {
        return new Channel(
            self::Title, self::Link, self::Author, self::Email,
            self::Image, self::Explicit, self::Categories,
            self::Description,self::Lang, self::Copyright, self::Ttl
        );
    }

    public function testChannel(): void {
        $channel = static::getChannel();
        $expected = file_get_contents(__DIR__ . '/fixtures/channel.xml');
        $actual = $channel->getXml();

        $this->assertEquals($expected, $actual, sprintf("##ACTUAL##\n\n%s\n\n##ENDS ACTUAL##\n", $actual));
    }
}