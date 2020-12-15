<?php

declare(strict_types=1);

final class WrongTemperatureUnitException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Wrong temperature unit');
    }
}
