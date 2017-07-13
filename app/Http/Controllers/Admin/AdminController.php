<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Booking;
use App\Payment;
use Carbon\Carbon;

class AdminController extends Controller
{
	public function index()
	{
		$today = Carbon::today()->toDateTimeString();
        $dt = explode(' ' ,$today);
        $dt0 = $dt[0];
        $datetime = explode('-' ,$dt0);
        $year = $datetime[0];
        $month = $datetime[1];
        $day = $datetime[2];

		$today = Booking::whereYear('created_at', $year)->whereMonth('created_at', $month)->whereDay('created_at', $day)->get();
		$booking_today = count($today);
		$p[] = '';
		for($i=0; $i<$booking_today; $i++){
			$price = $today[$i]->total_price;
			$p[$i] = $price;
		}
		$total = array_sum($p);

		$length = 12;
		for($i=0; $i<$length; $i++){
			$year_now = Booking::whereYear('created_at', $year)->whereMonth('created_at', $i+1)->get();
			$num_now = count($year_now);
			if($i < $month){
				$now[$i] = $num_now;
			}else{
				$now[$i] = null;
			}
		}

		for($i=0; $i<$length; $i++){
			$year_last = Booking::whereYear('created_at', $year-1)->whereMonth('created_at', $i+1)->get();
			$lastyear = Booking::whereYear('created_at', $year-1)->get();
			$num_lastyear = count($lastyear);
			if($num_lastyear != 0){
				$num_last = count($year_last);
				$last[$i] = $num_last;
			}else{
				$last[$i] = null;
			}
			
		}

		return view('admin.index', ['now' => $now, 'last' => $last, 'booking_today' => $booking_today, 'total' => $total]);
	}

	public function userManagement()
	{
		$role = Auth::user()->role_id;
		$admins = User::where('role_id', $role)->get();
		return view('admin.user-management.admin', ['admins' => $admins]);
	}
	
	public function customer()
	{
		$role = 11;
		$customers = User::where('role_id', $role)->get();
		return view('admin.user-management.customer', ['customers' => $customers]);
	}

	public function show($id)
	{
		$user = User::find($id);
		return view('admin.user-management.show', ['user' => $user]);
	}

	public function create()
	{
		return view('admin.create');
	}

	public function store(Request $request)
	{
		$this->validate($request,[
    		'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'birthday' => 'required|date',
            'address' => 'required|max:255',
        ]);

        $admin = new User;
	    $admin->first_name = $request->first_name;
	    $admin->last_name = $request->last_name;
	    $admin->username = $request->username;
	    $admin->email = $request->email;
	    $admin->gender = $request->gender;
	    $admin->birthday = $request->birthday;
	    $admin->address = $request->address;
	    $admin->role_id = 1;
	    $admin->password = bcrypt('1234');
	    $admin->save();

	    return redirect()->route('user-management.admin')->with('status', 'Create User is Successful!');
	}

	public function edit($id)
	{
		return view('admin.edit');
	}

	public function update(Request $request, $id)
	{
		$this->validate($request, [
            'password' => 'required|min:6|confirmed',
        ]);

		$admin = Auth::user();
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('user-management.admin');
	}

	public function destroy($id)
	{
		$user = User::withTrashed()->find($id);
		$trashed = $user->trashed();
		$msg = $user->first_name.' has been unblocked';
		if ($trashed) {
			$user->restore();

		}else{
			$user->delete();	
			$msg = $user->first_name.' has been blocked';
		}
        return redirect()->route('user-management.admin', ['trashed' => $trashed])->with('status', $msg);
	}

	public function blacklists()
	{
		$role = Auth::user()->role_id;
		$admins = User::onlyTrashed()->where('role_id', $role)->get();
		return view('admin.blacklists', ['admins' => $admins]);
	}
}
