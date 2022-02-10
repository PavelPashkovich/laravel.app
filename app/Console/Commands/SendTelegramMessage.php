<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SendTelegramMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:telegram-message {--M|message=Hello, my dear friend!}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends telegram message to the channel "laravelApp"';

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
        $idChannel = config('telegram_bot.id_channel');
        $apiToken = config('telegram_bot.api_token');
        $message = urlencode($this->option('message'));
        Http::get("https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$idChannel&text=".$message);
        $this->info('The message "' . $this->option('message') . '" was sent successfully!');

        return Command::SUCCESS;
    }
}
