Stop wasting time setting up basic things in laravel for admin panels

For guys out there who don't wanna waste time setting up admin templates every time when creating a new project, 
here I present you a basic laravel setup which you just have to download it and tweak it as you wish.

Note : I have used Admin LTE template which is a popular open source WebApp template for admin dashboards. 
Also uploaded the sql file named 'laravel_admin.sql' in the root directory.

Following are the features <br>
1 Login with validation
2 Admin profile
    -> admin details are prefilled in the admin form
    -> can edit the deatils with profile pic too
    -> jquery validations applied
3 Customer module
    -> listing of customers with search, pagination and sorting in datatable
    -> adding, updating and deletion of customers along with laravel validations

Perform the following steps after cloning the project
    -> run composer install after you clone the project
    -> copy the .env.example to .env or simply rename it to .env or copy from another project and set your configurations and APP_KEY
    -> create a symlink for storage (run this command - php artisan storage:link)
    -> I have set up virtual host for this project because I prefer my urls to be '/public/' free so I would request to make one to run things smoothly.

====== Login credentials =========
email: admin@gmail.com
password : 123456789

So whenever you wanna setup a fresh laravel project just download it, setup the database and you are ready to focus on the main logic.
Hope it will help laravel developers to some extend.

Any suggestions to improve code or anything regarding this post is highly appreciable.
