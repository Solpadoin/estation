<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BuildCommand extends Command
{
    /**
     * List of commands that needs to be run.
     *
     */
    const APP_CMDS = [
        'migrate',
        'view:cache',
        'scribe:generate',
        'route:cache',
        'key:generate'
    ];

    /**
     * The answer as a default value for question.
     *
     */
    const DEFAULT_ANSWER = 'yes';

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
        if ($this->ask('Do you want to build current project?', self::DEFAULT_ANSWER)) {
            $this->build();
        }

        return 0;
    }
}
