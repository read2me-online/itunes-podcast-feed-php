<?php
/**
 * Created by PhpStorm.
 * User: ninoskopac
 * Date: 01/05/2018
 * Time: 19:31
 */
declare(strict_types=1);
namespace iTunesPodcastFeed\Interfaces;

interface Channel extends Xml
{
    public function __construct(
        string $title, string $link, string $author, string $email, string $image, bool $isExplicit,
        string $category, string $subCategory, string $description, string $lang, string $copyright, int $ttl
    );
}