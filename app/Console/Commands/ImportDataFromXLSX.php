<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CityController;

class ImportDataFromXLSX extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import:xlsx';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import cities data from XLSX file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cityController = new CityController();
        $cityController->importFromXLSX();
    }
}
