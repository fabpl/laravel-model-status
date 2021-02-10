<?php

namespace Fabpl\ModelStatus\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model-status:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Model Status resources';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Migrations...
        $this->callSilent('vendor:publish', ['--tag' => 'model-status-migrations']);
    }
}
