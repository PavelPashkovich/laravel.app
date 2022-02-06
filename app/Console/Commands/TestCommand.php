<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';
//    protected $signature = 'command:test {name?}';
//    protected $signature = 'command:test {name} {--Q|queue=}';
//    protected $signature = 'command:test {name*} {--Q|queue=}';
//    protected $signature = 'command:test {name?*} {--Q|queue=}';

//    protected $signature = 'command:send-email {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info('Hi, Neo!');
//        $this->error($this->argument('name'));
//        $this->info($this->argument('name') ?? 'no argument');
//        $this->info(json_encode($this->argument('name')));
//        $this->info($this->option('queue'));
//        $answer = $this->ask('Follow the white rabbit?');
//        $this->info($answer);
//        $password = $this->secret('What is the password?');
//        $this->info($password);
//        $password = $this->confirm('What is the password?', true);
//        $this->info($password);



        return Command::SUCCESS;
    }
}
