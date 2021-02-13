<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PassangerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $auth = Auth::user();
        return view('admin.passanger.index', [
            'orders' => Order::where('user_id', $auth->id)->paginate(7)
        ]);
    }
}
