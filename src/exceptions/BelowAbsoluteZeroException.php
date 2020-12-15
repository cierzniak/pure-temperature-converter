<?php

declare(strict_types=1);

final class BelowAbsoluteZeroException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Temperature below absolute zero');
    }
}
