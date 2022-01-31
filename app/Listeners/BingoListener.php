<?php

namespace App\Listeners;

use App\Events\BingoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BingoListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BingoEvent  $event
     * @return void
     */
    public function handle(BingoEvent $event)
    {
        \Illuminate\Support\Facades\Mail::to(['ololo@mail.ru'])
            ->cc(['ololo2@mail.ru', 'ololo3@mail.ru'])
            ->send(new \App\Mail\BingoMail($event->balance));
    }
}
