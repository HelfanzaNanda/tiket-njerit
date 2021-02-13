<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Departure;
use App\Models\Order;
use App\Models\Passanger;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{
    
    public function home($orderId = '')
    {
        $departures = Departure::all();
        $res = [];
        foreach ($departures as $departure) {
            if ($departure->car) {
                array_push($res, $departure);
            }
        }
        return view('user.home', [
            'departures' => $res,
            'orderId' => $orderId
        ]);
    }

    public function bus()
    {
        $departures = Departure::all();
        $res = [];
        foreach ($departures as $departure) {
            if ($departure->car) {
                array_push($res, $departure);
            }
        }
        return view('user.bus', [
            'departures' => $res
        ]);        
    }

    public function bus_search(Request $request)
    {
        $departures = Departure::where('origin', 'like', '%'. $request->origin .'%')
        ->where('dest', 'like', '%'. $request->dest .'%')
        ->where('days', 'like', '%'. $request->day .'%')->get();
        $res = [];
        foreach ($departures as $departure) {
            if ($departure->car) {
                array_push($res, $departure);
            }
        }
        return view('user.bus', [
            'origin' => $request->origin,
            'dest' => $request->dest,
            'date' => $request->date,
            'day' => $request->day,
            'departures' => $res
        ]);      
    }

    public function detail(Request $request)
    {
        $departure = Departure::with('car')->findOrFail($request->id);
        return view('user.detail', [
            'departure' => $departure,
            'date' => $request->date,
        ]);
    }

    public function order(Request $request)
    {
        $passanger = Passanger::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'no_unique' => $request->no_unique,
        ]);

        $departure = Departure::findOrFail($request->id);
        $order = Order::create([
            'passanger_id' =>$passanger->id,
            'departure_id' => $departure->id,
            'user_id' => $departure->user->id,
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
            'total' => $departure->price,
        ]);

        return redirect()->route('user.home', $order->id)->with('success', 'berhasil order');
    }

    public function tiket($orderId)
    {
        $order = Order::findOrFail($orderId);
        // return view('user.tiket', [
        //     'order' => $order
        // ]);
        $pdf = PDF::loadView('user.tiket', [
            'order' => $order
        ]);
        return $pdf->download('tiket.pdf');
    }
}
