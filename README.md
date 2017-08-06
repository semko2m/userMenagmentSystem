#Laravel 5.4

#PHP 7 and above

##User Roles

admin user name :  semko2m@gmail.com
admin pass : 123company123

###Epic: User management system 

 
Stories:
 

- As an admin I can add users (Admin, or basic user) - A user has a name ,email, pass 
- As an admin I can delete users
- As an admin I can assign users to a group they aren’t already part of
- As an admin I can remove users from a group
- As an admin I can create groups
- As an admin I can delete groups when they no longer have members 

-As an basic user I can login to dashboard.

Any person can register like basicUser. Admin only can create Admin User


To test app in local :
- Run Composer install
- Run php artisan migrate --seed
- Run test Unit/userAdminRolesTest.php


Live demo app : http://sehara.eu/
