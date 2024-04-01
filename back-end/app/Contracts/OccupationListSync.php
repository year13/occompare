<?php

namespace App\Contracts;

interface OccupationListSync
{
    function list(): array;
    function writeToFile(array $occupations): int|bool;
}
