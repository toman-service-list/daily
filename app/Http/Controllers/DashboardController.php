<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Statistic::whereDate('created_at', Carbon::today())->get();
        $sum1 = Statistic::whereDate('created_at', Carbon::today())->where('type', 0)->sum('quantity');
        $sum2 = Statistic::whereDate('created_at', Carbon::today())->where('type', 1)->sum('quantity');
        return view('dashboard.index', compact('data', 'sum1', 'sum2'));
    }
}
