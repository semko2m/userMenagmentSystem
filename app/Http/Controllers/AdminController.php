<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminPages.welcome');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * User list
     */
    public function manageAdmins()
    {
        $data['users'] = User::all();
        return view('adminPages.list', $data);
    }

    /**
     * @param $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Check what user want to create
     */
    public function createUserType($type)
    {
        $data['type'] = $type;
        return view('adminPages.editUser', $data);
    }

    public function updateUserView($id)
    {
        $data['user'] = User::where('id', $id)->first();
        return view('adminPages.editUser', $data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUserDB($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,' . $id,
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::where('id', $id)->first();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
//        $user->attachRole($basicUserRole);
        $user->save();
        return redirect()->route('manage.admins');
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('manage.admins');

    }

    /**
     * @param Request $request
     * @param $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createUser(Request $request, $type)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
//        $user->attachRole($basicUserRole);
        $user->save();
        $basicUserRole = new Role();
        $basicUserRole = Role::where('name', '=', $type)->first();

        $user->attachRole($basicUserRole);
        return redirect()->route('manage.admins');
    }
}
