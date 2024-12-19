<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;

class DeleteInactiveAccounts extends Command
{
    protected $signature = 'delete:inactive-accounts';
    protected $description = 'Delete user accounts that have not been activated for more than 1 days';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Lấy thời gian hiện tại trừ đi ngày tạo
        $DaysAgo = Carbon::now()->subDays(1);

        // Xóa các tài khoản có `email_verified_at` là null và `created_at` quá 1 ngày
        User::whereNull('email_verified_at')
            ->where('created_at', '<', $DaysAgo)
            ->delete();

        $this->info('Inactive accounts older than 1 days have been deleted.');
    }
}
