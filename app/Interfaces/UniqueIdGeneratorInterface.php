<?php

namespace App\Interfaces;

interface UniqueIdGeneratorInterface
{
    public function getUniqueId(
        ?int $minLength = null,
        ?int $maxLength = null
    ): string;
}
