<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReminderEmail implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;
    protected $user;
    protected $news;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, News $news)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
