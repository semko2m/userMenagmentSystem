<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Groups;

class GroupsController extends Controller
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
        $data['groups'] = Groups::all();
        return view('adminPages.groups.index', $data);
    }

    public function groupsCreateView()
    {
        return view('adminPages.groups.editGroup');
    }

    public function groupsCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:groups',
            'description' => 'required|string|min:6',
        ]);

        $group = new Groups();
        $group->name = $request['name'];
        $group->description = $request['description'];
        $group->save();

        return redirect()->route('manage.groups');
    }

    public function deleteGroup($id)
    {
        $group = Groups::where('id', $id)->first();
        $userIn = $group->users()->get()->toArray();
        if (empty($userIn)) {
            $group->delete();
            return redirect()->route('manage.groups');
        } else {
            return redirect()->route('manage.groups')->with('message', 'This group isnt\'t empty. Please delete first users from this group ');
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUsersGroup($id)
    {
        $data['group'] = Groups::where('id', $id)->first();

        $data['usersIN'] = Groups::where('id', $id)->first()->users()->get();

        $data['usersOUT'] = User::all();


        return view('adminPages.groups.addUserToGroup', $data);


    }


    /**
     * @param $userId
     * @param $groupId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insertUserToGroup($userId, $groupId)
    {
        $group = Groups::where('id', $groupId)->first();
        $group->users()->attach($userId);
        return redirect()->route('admin.addUsersGroup', $groupId);
    }

    /**
     * @param $userId
     * @param $groupId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUserToGroup($userId, $groupId)
    {
        $group = Groups::where('id', $groupId)->first();
        $group->users()->detach($userId);
        return redirect()->route('admin.addUsersGroup', $groupId);
    }

}
