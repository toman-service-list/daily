<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $number = $request->number;
        $quantity = $request->quantity;
        $type = $request->type;

        $exist = Statistic::where('number', $number)
                ->where('type', $type)
                ->whereDate('created_at', today())
                ->first();
        
        if ($exist) {
            $exist->quantity = (int) $exist->quantity + (int) $quantity;
            $exist->save();
        } else {
            $new = new Statistic();
            $new->number = $number;
            $new->quantity = $quantity;
            $new->type = $type;
            $new->save();
        }
        $data = Statistic::whereDate('created_at', Carbon::today())->get();
        $sum1 = Statistic::whereDate('created_at', Carbon::today())->where('type', 0)->sum('quantity');
        $sum2 = Statistic::whereDate('created_at', Carbon::today())->where('type', 1)->sum('quantity');
        return redirect()->route('dashboard', compact('data', 'sum1', 'sum2'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $number = $request->number;
        $quantity = $request->quantity;
        $type = $request->type;

        $exist = Statistic::where('number', $number)
                ->where('type', $type)
                ->whereDate('created_at', today())
                ->first();
        
        
        if ($exist) {
            if ((int) $exist->quantity - (int) $quantity <= 0) {
                Statistic::where('id', $exist->id)->delete();
            } else {
                $exist->quantity = (int) $exist->quantity - (int) $quantity;
                $exist->save();
            }
        }
        $data = Statistic::whereDate('created_at', Carbon::today())->get();
        $sum1 = Statistic::whereDate('created_at', Carbon::today())->where('type', 0)->sum('quantity');
        $sum2 = Statistic::whereDate('created_at', Carbon::today())->where('type', 1)->sum('quantity');
        return redirect()->route('dashboard', compact('data', 'sum1', 'sum2'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        //
    }
}
