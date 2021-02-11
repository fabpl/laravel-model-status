<?php

namespace Fabpl\ModelStatus\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'model-status:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the Model Status resources';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Configuration...
        $this->callSilent('vendor:publish', ['--tag' => 'model-status-config']);

        $this->info('Model Status resources published.');
    }
}
