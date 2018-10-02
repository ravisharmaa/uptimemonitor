<?php
/**
 * Created by PhpStorm.
 * User: ravi
 * Date: 10/2/18
 * Time: 12:16 PM.
 */

namespace App\Http\Helpers;

class CsvParser
{
    public function parseFile($file)
    {
        if (!is_file($file)) {
            return false;
        }
        $csvData = array_map('str_getcsv', file($file));

        $header = array_map(function ($value) {
            return strtolower(preg_replace('/\s+/', '', $value));
        }, $csvData[0]);


        array_walk($csvData, function (&$row) use ($header) {
            $row = array_combine($header, $row);
        });

       array_shift($csvData);

        return $csvData;
    }
}
