<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InvoiceCalculation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var array
     */
    private $lines;

    /**
     * Create a new command instance.
     *
     * @param array $lines
     */
    public function __construct($lines = [])
    {
        parent::__construct();

        $this->lines = $lines;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //you have passed me an array of lines
        dd($this->lines);
    }
}
