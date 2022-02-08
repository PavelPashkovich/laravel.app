<?php

namespace App\Console\Commands;

use App\Mail\BingoMail;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'send:email {userID} {--message=Long Live Belarus!}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends email to a user';

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
        $user = User::findOrFail($this->argument('userID'));
        $email = $user->email;
        $message = $this->option('message');
        Mail::to($email)->send(new SendMail($message));
        $this->info('The message "' . $message . '" was sent successfully to ' . $email);

        return Command::SUCCESS;
    }
}
