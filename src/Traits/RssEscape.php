<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 02/05/2018
 * Time: 00:02
 */
declare(strict_types=1);
namespace iTunesPodcastFeed\Traits;

trait RssEscape {
    protected function escape(string $str): string {
        // https://stackoverflow.com/a/11787940/1325575
        $str = str_replace(array('&', '<'), array('&#x26;', '&#x3C;'), $str);

        return $str;
    }
}