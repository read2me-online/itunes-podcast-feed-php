<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 22:10
 */

use iTunesPodcastFeed\Channel;
use iTunesPodcastFeed\FeedGenerator;
use iTunesPodcastFeed\Item;

require __DIR__ . '/vendor/autoload.php';

$title = 'Read2Me Daily Curated Articles';
$link = 'https://read2me.online';
$author = 'NYTimes and Medium';
$email = 'hello@read2me.online';
$image = 'https://d22fip447qchhd.cloudfront.net/api/widget/static/images/default-thumbnail.png';
$explicit = false;
$categories = [
    'News',
    'Technology',
    'Culture',
    'Entrepreneurship',
    'Productivity'
];
$description = 'Daily curated articles from New York Times and Medium';
$lang = 'en';
$copyright = 'The New York Times Company and The Medium Company';
$ttl = 43200; // 12 hours in seconds

// channel meta
$channel = new Channel(
    $title, $link, $author, $email,
    $image, $explicit, $categories,
    $description, $lang, $copyright, $title
);

$title = "Trump Says Disclosure of Mueller Questions in Russia Probe Is ‘Disgraceful’";
$file_Url = 'https://s3.read2me.online/audio/www-nytimes-com-2018-05-01-us-politics-trump-mueller-russia-questions-html-7e9601.mp3';
$duration = '2:18';
$description = 'WASHINGTON — President Trump on Tuesday said it was “disgraceful” that questions the special counsel would like to ask him were publicly disclosed, and he incorrectly noted that there were no questions about collusion. The president also said collusion was a “phony” crime.';
$date = 1525177808;
$filesize = 828387;
$mime = 'audio/mpeg';

// i.e. an episode
$item = new Item(
    $title, $file_Url, $duration,
    $description, $date, $filesize, $mime
);
$item2 = clone $item; // just to give you an idea of how it works

$feed = new FeedGenerator($channel, ...[$item, $item2]);

print $feed->getXml();