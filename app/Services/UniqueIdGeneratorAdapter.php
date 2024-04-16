<?php

namespace App\Services;

use App\Interfaces\UniqueIdGeneratorInterface;
use Sqids\Sqids;

class UniqueIdGeneratorAdapter implements UniqueIdGeneratorInterface
{
    public function getUniqueId(
        ?int $minLength = null,
        ?int $maxLength = null
    ): string {
        if (! class_exists(Sqids::class)) {
            throw new \Exception('Library "sqids/sqids" is not installed.');
        }

        /**
         * @see https://sqids.org/
         */
        $sqids = new Sqids(
            alphabet: 'knXFriANDwOsBYKhMugReqxTHSJfovGaPVZcdUjbLIEWltzQpmyC',
            minLength: $minLength ?? Sqids::DEFAULT_MIN_LENGTH
        );
        $now = gettimeofday();
        $numbers = [$now['sec'], $now['usec'], random_int(0, 32768)];
        $uniqueId = $sqids->encode($numbers);

        return $maxLength ? mb_strimwidth($uniqueId, 0, $maxLength) : $uniqueId;
    }
}
