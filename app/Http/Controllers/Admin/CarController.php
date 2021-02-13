<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }
    
    public function index()
    {
        $auth = Auth::user();
        return view('admin.car.index', [
            'cars' => Car::where('user_id', $auth->id)->paginate(7),
        ]);
    }

    public function create()
    {
        return view('admin.car.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'image' => ['required']
        ]);

        auth()->user()->cars()->create([
            'name' => $request->name,
            'filename' => $this->uploadImage($request->file('image')),
        ]);

        return redirect()->back()->with('success', 'berhasil menambahkan data');

    }
    public function edit($id)
    {
        return view('admin.car.edit', [
            'car' => Car::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'image' => ['required']
        ]);

        $car = Car::findOrFail($id);
        $car->update([
            'name' => $request->name,
            'filename' => $request->file('image') ? $this->uploadImage($request->file('image')) : $car->filename,
        ]);

        return redirect()->route('admin.car.index')->with('success', 'berhasil mnegupdate data');
    }

    public function delete($id)
    {
        Car::destroy($id);
        return redirect()->back()->with('success', 'berhasil menghapus data');
    }

    private function uploadImage($image){
        $filename = time() . '-car' . '.' . $image->getClientOriginalExtension();
        $path = public_path('uploads/car');
        $image->move($path, $filename);
        return $filename;
    }
}
