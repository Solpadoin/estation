<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BuildCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command builds and setup project.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    const APP_CMDS = [
        'route:cache',
        'migrate',
        'view:cache',
        'key:generate'
    ];

    private function build()
    {
        foreach (self::APP_CMDS as $value) {
            $this->call($value);
        }
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->ask('Do you want to build current project?', 'yes')) {
            $this->build();
        }

        return 0;
    }
}
