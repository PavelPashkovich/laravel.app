<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BingoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $balance;
    public $test;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($balance)
    {
        $this->balance = $balance;
        $this->test = 'Hi, Neo!';
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('mails.bingo')
            ->with([
                'text' => 'You won!'
            ]);
    }
}
