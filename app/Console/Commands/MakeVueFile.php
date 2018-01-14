<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeVueFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dcas:make:vue {fileName} {--D|directory=resources/assets/js/components/}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Vue file';

    /**
     * Location of Stubs.
     *
     * @var string
     */
    protected $locationOfStub = 'app/Console/Stubs/MakeVue.stub';

    /**
     * Filename.
     *
     * @var string
     */
    protected $fileName;

    /**
     * Create a new command instance.
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
        $this->fileName = ucfirst($this->argument('fileName')) . '.vue';

        (!\File::copy($this->locationOfStub, $this->option('directory') . $this->fileName)) ?
            $this->error('Couldn\'t copy stub file {$this->locationOfStub} to {$this->fileName}.') :
            $this->info('File copied.');

        return true;
    }
}
