<?php

namespace App\Console\Commands;

use App\Models\Contract;
use Illuminate\Console\Command;
use App\Notifications\ContractUpdatedReminder;

class ContractUpdated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contract:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Contract that have not updated yet';

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
        $contract = Contract::whereDate('updated_at', now()->subDays(5)->format('Y-m-d'))->get();
        foreach ($contract as $key => $value) {
            $value->seller->notify(new ContractUpdatedReminder($value));
        }
    }
}
