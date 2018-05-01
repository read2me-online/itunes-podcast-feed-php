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
    /**
     * Item constructor.
     * @param string $title
     * @param string $fileUrl
     * @param string $duration For example: 2:29
     * @param string $description
     * @param int $date Since unix epoch
     * @param int $fileSizeBytes
     * @param string $mime
     */
    public function __construct(
        string $title, string $fileUrl, string $duration, string $description,
        int $date, int $fileSizeBytes, string $mime
    );
}