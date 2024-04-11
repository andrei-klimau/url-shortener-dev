<?php

namespace App\Services;

use App\Interfaces\UniqueIdGeneratorInterface;
use Sqids\Sqids;

class UniqueIdGeneratorAdapter implements UniqueIdGeneratorInterface
{
    public function getUniqueId(): string
    {
        if (! class_exists(Sqids::class)) {
            throw new \Exception('Library "sqids/sqids" is not installed.');
        }

        $now = gettimeofday();
        $sqids = new Sqids(minLength: 8);
        $numbers = [$now['sec'], $now['usec'], random_int(0, 32768)];

        return $sqids->encode($numbers);
    }
}
