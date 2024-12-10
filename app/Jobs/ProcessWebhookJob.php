<?php

namespace App\Jobs;

use Illuminate\Foundation\Queue\Queueable;

class ProcessWebhookJob extends \Spatie\WebhookClient\Jobs\ProcessWebhookJob
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info(json_encode($this->webhookCall));
    }
}
