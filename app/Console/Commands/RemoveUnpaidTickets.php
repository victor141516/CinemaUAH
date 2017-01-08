<?php

namespace App\Console\Commands;

use App\Ticket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class RemoveUnpaidTickets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove_unpaid_tickets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove unpaid tickets';

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
        Ticket::where('updated_at', '<', Carbon::now()->subMinute(10))->delete();
    }
}
