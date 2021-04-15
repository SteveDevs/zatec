System:

App uses laravel backend.
Has a REST API that interacts with vue.
Uses a MySQL database

How to run:
create a database and refernence it .env.

run composer install 
run npm install
run npm run dev
run php artisan migrate
run php artisan db:seed
-------------------------------------------------------------------------------------------------------------
Flow of the App:
With server running at http://localhost:8000

Go to admin:
http://localhost:8000/admin
If you seeded: the login is email: admin@admin.com, password: password
You can logged out, view products table(http://localhost:8000/admin/products).
Create new product at: http://localhost:8000/admin/products/create
On the products table click on edit on row to edit particular product.

User section:
http://localhost:8000/user
Navigate using links at the top. If you cant see the links open the screen to full screen.
Need to login for the sections to work properly, so register and login.

Actions:    View and purchase products.
            View user current balance and add money via topup
            View user transactions
            Login as a user
            Register a new user

-------------------------------------------------------------------------------------------------------------

Problems:

The login for the user does not work properly so I opened the api in server to access the data.
The larvel routes limit reload of pages on the frontend, would need to inlcude a regular expression for the frontend routes.


Improvements:

modify how updates are done to the database.

Use Laravel default relationship for models more.

Make more comments in the code.

Implement tests

Complete the auth guards that have been intialized but not implemented.