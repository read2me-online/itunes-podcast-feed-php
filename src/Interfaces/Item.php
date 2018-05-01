<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 19:32
 */
declare(strict_types=1);
namespace iTunesPodcastFeed\Interfaces;


interface Item extends Xml
{
    public function __construct(
        string $title, string $url, int $duration, string $description,
        int $date, int $fileSizeBytes, string $mime
    );
}