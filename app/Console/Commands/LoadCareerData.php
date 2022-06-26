<?php

namespace App\Console\Commands;

use App\Models\Career;
use Illuminate\Console\Command;

class LoadCareerData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'career:load';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load Career Data';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Career::truncate();
        
        $filePath = storage_path('app/data.csv');

        $fileH = fopen($filePath,'r+');

        $headers = null;
        while( ($row = fgetcsv($fileH)) ){

            if ( !$headers ){
                $headers = $row;
                continue;
            }


            Career::create([
                'career_name' => $row[0],
                'education' => $row[1],
                'skills' => $row[2],
                'interests' => $row[3],   
            ]);
        }

        fclose($fileH);
    }
}
