<?php

namespace App\Jobs;

use App\Http\Controllers\Uploader\StorageInterface;
use App\Models\Image;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OldImageDeleteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $run_remind;
    public function __construct()
    {
        $this->run_remind = 3;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(StorageInterface $driver)
    {
        $images = Image::where('created_at','<=',Carbon::now()->subDays(3)->toDateTimeString())->get();
        if ($images){
            foreach ($images as $image){
                $driver->clear($image->path);
            }
            $images->delete();
        }
        if ($this->run_remind > 0){
            OldImageDeleteJob::dispatch()->delay(now()->addSeconds(20));
            $this->run_remind-=1;
        }
    }
}
