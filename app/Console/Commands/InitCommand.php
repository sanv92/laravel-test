<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '[migrate + seed]';

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
     * @return mixed
     */
    public function handle()
    {
        $this->call('migrate:reset');
        $this->call('migrate');
        $this->call('db:seed');
        $this->info('
       :\     /;               _\'
      ;  \___/  ;             ; ;\'
     ,:-"\'   \'"-:.            / ;\'
_   /,---.   ,---.\   _     _; /\'
_:>((  |  ) (  |  ))<:_ ,-""_,"\'
    \`````   `````/""""""""\'
     \'-.._ v _..-\'      )"
       / ___   ____,..  \/\'
      / /   | |   | ( \. \/\'
     / /    | |    | |  \ \/\'
     `"     `"     `"    `"\'
        ');
    }
}

