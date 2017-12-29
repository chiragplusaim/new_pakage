<?php

namespace evalue\crud;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class EvalueCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:ecrud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate a crud operation';

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
        //
        $this->info('CRUD files generated successfully!');
    }
}
