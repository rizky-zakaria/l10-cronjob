<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class RunCronjob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronjob:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah untuk menjalankan cronjob';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::create([
            'name' => 'Admin' . date('ymd'),
            'email' => 'admin' . date('his') . '@gmail.com',
            'password' => Hash::make('admin')
        ]);

        $this->info('Successfully Create User.');
    }
}
