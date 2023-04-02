<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\CalculateTopupUsers;
use App\Models\User;
use App\Models\TopTopupUser;

class TopUpUserController extends Controller
{
    public function index()
    {
        $topup_users = TopTopupUser::with('user')
            // ->withMax('topup', 'created_at')
            // ->withSum('topup', 'amount')
            ->orderByDesc('count')
            ->paginate(2)
            ->appends(['search' => request('search')]);

        return view('topup-users', compact('topup_users'));
    }

    public function indexByAmount()
    {
        $topup_users = TopTopupUser::with('user')
            ->orderByDesc('total_amount')
            ->paginate(2)
            ->appends(['search' => request('search')]);

        return view('topup-users', compact('topup_users'));
    }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('name', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->get();

        $user_ids = $users->pluck('id');

        $topup_users = TopTopupUser::with('user')
            ->whereIn('user_id', $user_ids)
            ->orderByDesc('count')
            ->paginate(2)
            ->appends(['search' => request('search')]);

        return view('topup-users', compact('topup_users'));
    }

    public function calculate()
    {
        dispatch(new CalculateTopupUsers());
        return redirect()->route('topup-users.index')->with('status', 'Top-Up users calculation process initiated successfully.');
    }
}
