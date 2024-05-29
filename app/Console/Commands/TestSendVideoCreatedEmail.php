<?php

namespace App\Console\Commands;

use App\Notifications\VideoCreated;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class TestSendVideoCreatedEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:videocreatednotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Notification::route('mail', 'aoraa1@iesebre.com')->notify(new VideoCreated(create_sample_video()));
    }
}
