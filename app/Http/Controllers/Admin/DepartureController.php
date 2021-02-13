<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Car, Departure};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartureController extends Controller
{
    public $days =  ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = Auth::user();
        return view('admin.departure.index', [
            'departures' => Departure::where('user_id', $auth->id)
                ->paginate(7),
        ]);
    }

    public function create()
    {
        $auth = Auth::user();
        return view('admin.departure.create', [
            'cars' => Car::where('user_id', $auth->id)->get(),
            'days' => $this->days,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'car' => ['required'],
            'origin' => ['required'],
            'dest' => ['required'],
            'price' => ['required', 'numeric'],
            'days' => ['required'],
        ]);
        $days = collect($request->days)->implode(',');
        auth()->user()->departures()->create([
            'car_id' => $request->car,
            'origin' => $request->origin,
            'dest' => $request->dest,
            'price' => $request->price,
            'days' => $days,
        ]);

        return redirect()->back()->with('success', 'berhasil menambahkan data');
    }

    public function edit($id)
    {
        $auth = Auth::user();
        return view('admin.departure.edit', [
            'departure' => Departure::where('id', $id)->first(),
            'cars' => Car::where('user_id', $auth->id)->get(),
            'days' => $this->days,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'car' => ['required'],
            'origin' => ['required'],
            'dest' => ['required'],
            'price' => ['required', 'numeric'],
            'days' => ['required'],
        ]);
        $days = collect($request->days)->implode(',');
        $departure = Departure::findOrFail($id);
        $departure->update([
            'car_id' => $request->car,
            'origin' => $request->origin,
            'dest' => $request->dest,
            'price' => $request->price,
            'days' => $days,
        ]);


        return redirect()->route('admin.departure.index')->with('success', 'berhasil mnegupdate data');
    }

    public function delete($id)
    {
        Departure::destroy($id);
        return redirect()->back()->with('success', 'berhasil menghapus data');
    }
}
