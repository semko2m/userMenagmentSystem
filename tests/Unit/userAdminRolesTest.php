<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class userAdminRolesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
        /*
        * Role
        */

        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description = 'User is allowed to manage and edit other users and groups'; // optional
        $admin->save();

        /*
        * Role
        */

        $basicUserRole = new Role();
        $basicUserRole->name = 'user';
        $basicUserRole->display_name = 'Basic user'; // optional
        $basicUserRole->description = 'Basic user can be registered throw register form'; // optional
        $basicUserRole->save();

        /*
        * User
        */

        $user = new User();
        $user = User::where('email', '=', 'semko2m@gmail.com')->first();
        $user->attachRole($admin);

        /*
         * Permission
         */
        $editUser = new Permission();
        $editUser->name = 'edit-user';
        $editUser->display_name = 'Edit Users'; // optional
        // Allow a user to...
        $editUser->description = 'edit existing users'; // optional
        $editUser->save();

        $admin->attachPermission($editUser);

        /*
         * Permission
         */
        $createPost = new Permission();
        $createPost->name = 'create-post';
        $createPost->display_name = 'Create Posts'; // optional
        // Allow a user to...
        $createPost->description = 'create new blog posts or some basic operation'; // optional
        $createPost->save();

        $basicUserRole->attachPermission($createPost);

    }
}
