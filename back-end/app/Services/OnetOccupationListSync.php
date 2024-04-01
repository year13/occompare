<?php

namespace App\Services;

use App\Contracts\OccupationListSync;

class OnetOccupationListSync implements OccupationListSync
{

    private const URL = 'https://www.onetonline.org/find/all/All_Occupations.csv?fmt=csv';

    private static function isValidCSVRow(array $values): bool
    {
        return count($values) === 4 && strtolower(trim($values[0])) !== 'n/a';
    }

    public function list(): array
    {
        $data = file_get_contents(self::URL);
        $rows = explode("\n", $data);
        $parsedRows = collect();

        foreach ($rows as $i => $row) {
            $values = str_getcsv($row);
            if ($i > 0 && self::isValidCSVRow($values)) {
                $parsedRows->push([
                    'code'  => trim(strtoupper($values[1])),
                    'title' => trim($values[2]),
                ]);
            }
        }

        return $parsedRows->all();
    }

    public function writeToFile(array $occupations): int|bool
    {
        return file_put_contents(storage_path('app/onet_occupations.json'), json_encode($occupations));
    }
}
