<?php

namespace App\Http\Controllers\admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class DashboardController extends Controller
{
    public function dashboard(){

        $totalEarnings = Order::sum('total');
        $orderCoumts = Order::count();
        $userCounts = User::where('role', 'user')->count();

        return view("admins.dashboards.dashboard", compact('totalEarnings','orderCoumts', 'userCounts'));

    }

}
