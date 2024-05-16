to set up project:

1. start mysql server & ensure env file contains correct config for your server
2. the "ridgetzoo" database will not exist on your mysql server so please take the query from `/openMe/createDb.sql` and run it in mysql
3. then run `php artisan migrate`
4. then run `php artisan db:seed`

to run:
1. place project in xampp hdocs folder
2. run `npm run dev` 
3. visit `http://localhost/RidgetZoo/public/`
