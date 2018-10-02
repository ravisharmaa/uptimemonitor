<?php

namespace App\Http\Controllers;

use App\Http\Helpers\CsvParser;
use App\Monitor;

class UpTimeController extends Controller
{
    public function index(CsvParser $csvParser)
    {
        $parsedData = $csvParser->parseFile(storage_path('srv.csv'));

        foreach ($parsedData as $key => $value) {
            Monitor::updateOrCreate($value);
        }

        return Monitor::all();

    }
}
