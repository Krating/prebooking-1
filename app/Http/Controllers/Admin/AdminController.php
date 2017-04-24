<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class AdminController extends Controller
{
	public function home()
	{
		return view('admin.home');
	}

	public function userManagement()
	{
		$role = Auth::user()->role_id;
		$admins = User::where('role_id', $role)->get();
		return view('admin.user-management', ['admins' => $admins]);
	}
	
	public function customer()
	{
		$role = 11;
		$customers = User::where('role_id', $role)->get();
		return view('admin.customer', ['customers' => $customers]);
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

	    return redirect()->route('admin.user-management')->with('status', 'Create User is Successful!');
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
        return redirect()->route('admin.user-management');
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
        return redirect()->route('admin.user-management', ['trashed' => $trashed])->with('status', $msg);
	}

	public function blacklists()
	{
		$role = Auth::user()->role_id;
		$admins = User::onlyTrashed()->where('role_id', $role)->get();
		return view('admin.blacklists', ['admins' => $admins]);
	}
}
