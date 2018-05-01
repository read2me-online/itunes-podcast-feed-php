<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 21:09
 */
declare(strict_types=1);
namespace iTunesPodcastFeed\Interfaces;


interface Xml
{
    /**
     * @return string
     */
    public function getXml(): string;
}