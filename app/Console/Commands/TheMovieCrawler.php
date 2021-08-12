<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TheMovieCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'themovie:crawler';

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
        $theMovieCrawler = new \App\Crawler\TheMovieCrawler();
        $theMovieCrawler->getPopular();
    }
}
