<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\DataSewa;

class MulaiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sewa:mulai';

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
            ['keterangan', '=', 'Aktif'],
            ['tanggal_mulai', '<', Carbon::today()->toDateString()],
            ['tanggal_selesai', '>', Carbon::today()->toDateString()],
        ]);

        $booking_list_status['keterangan'] = 'Mulai';

        if($data_booking_list->update($booking_list_status))
            $this->info('Start booking-an selesai');
    }
}
