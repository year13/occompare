<?php

namespace App\Contracts;

interface OccupationParser
{
    function setScope($scope): void;
    function getScope(): string;
    function getUrl($occupation_code): string;
    function list(): array;
    function get($occupation_code): array;
}
