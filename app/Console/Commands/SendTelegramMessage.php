<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $idChannel = '-1001715513410';
        $botToken = '5164652291:AAFUjnpQwHOLKWcAme6VOg_wy2Pyp1TYxx4';
        $message = urlencode($this->option('message'));
        file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$idChannel&text=".$message);
        $this->info('The massage "' . $this->option('message') . '" was sent successfully!');

        return Command::SUCCESS;
    }
}
