[![Build Status](https://travis-ci.org/read2me-online/itunes-podcast-feed-php.svg?branch=master)](https://travis-ci.org/read2me-online/itunes-podcast-feed-php)
[![Maintainability](https://api.codeclimate.com/v1/badges/b3627887f7dfd63d2fc9/maintainability)](https://codeclimate.com/github/read2me-online/itunes-podcast-feed-php/maintainability)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/read2me-online/itunes-podcast-feed-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/read2me-online/itunes-podcast-feed-php/?branch=master)

# Installation
`composer require read2me-online/itunes-podcast-feed-php`

# Usage
Put this in a file that you want to become your feed (e.g. `https://mysite.com/rss/feed.php`):

```php
use iTunesPodcastFeed\Channel;
use iTunesPodcastFeed\FeedGenerator;
use iTunesPodcastFeed\Item;

require __DIR__ . '/vendor/autoload.php';

// SETUP CHANNEL
$title = 'Read2Me Daily Curated Articles';
$link = 'https://read2me.online';
$author = 'NYTimes and Medium';
$email = 'hello@read2me.online';
$image = 'https://d22fip447qchhd.cloudfront.net/api/widget/static/images/android-chrome-1400x1400.png';
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

$channel = new Channel(
    $title, $link, $author, $email,
    $image, $explicit, $categories,
    $description, $lang, $copyright, $ttl
);

// SETUP EPISODE
$title = "Trump Says Disclosure of Mueller Questions in Russia Probe Is ‘Disgraceful’";
$fileUrl = 'https://s3.read2me.online/audio/www-nytimes-com-2018-05-01-us-politics-trump-mueller-russia-questions-html-7e9601.mp3';
$duration = '2:18';
$description = 'WASHINGTON — President Trump on Tuesday said it was “disgraceful” that questions the special counsel would like to ask him were publicly disclosed, and he incorrectly noted that there were no questions about collusion. The president also said collusion was a “phony” crime.';
$date = 1525177808;
$filesize = 828387;
$mime = 'audio/mpeg';

$item = new Item(
    $title, $fileUrl, $duration,
    $description, $date, $filesize, $mime
);
$item2 = clone $item; // just to give you an idea of how it works

// SETUP FEED
$feed = new FeedGenerator($channel, ...[$item, $item2]);

// OUTPUT XML
header('Content-Type: application/xml; charset=utf-8');

print $feed->getXml();
```

Then, go to https://podcastsconnect.apple.com/my-podcasts/new-feed and submit your feed.

# Addendum
- XML syntax based off [aaronsnoswell/itunes-podcast-feed
](https://github.com/aaronsnoswell/itunes-podcast-feed)
- This library is in production use at [Read2Me](https://read2me.online/)
- Demo: https://read2me.online/rss/daily-curated-articles.php
- iTunes link for the aforementioned demo: https://itunes.apple.com/hr/podcast/read2me-daily-curated-articles/id1378984368
- Donate: https://paypal.me/skopac
