<?php


namespace App\Infrastructure\Util;


class CircularReferenceHandler
{
    public function __invoke($object)
    {
        return [];
    }
}