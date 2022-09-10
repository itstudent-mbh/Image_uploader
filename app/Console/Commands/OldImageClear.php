<?php

namespace App\Console\Commands;

use App\Jobs\OldImageDeleteJob;
use Illuminate\Console\Command;

class OldImageClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear images are older than 3 days from database and Storage';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        OldImageDeleteJob::dispatch();
    }
}
