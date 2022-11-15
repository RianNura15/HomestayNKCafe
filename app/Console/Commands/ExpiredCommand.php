<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\DataSewa;

class ExpiredCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sewa:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $data_booking_list = DataSewa::where([
            ['keterangan', '=', '-'],
            ['buktipembayaran', '=', '-'],
            ['expired', '<', Carbon::now()->toTimeString()],
        ])->update(['keterangan' => 'Expired', 'setuju' => '0']);
    }
}
