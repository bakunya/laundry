# laundry
## _Manage your laundry data from web app_

## Installation
Clone this repository
```sh
git clone https://github.com/bakunya/web-perpus.git
```
Import laundry.sql file in phpmyadmin or mysql dbms
```sh
laundry/laundry.sql
```
Copy this folder or directory in htdocs if you using XAMPP or configure your own apache config if you using linux and manual web server

Open localhost/laundry/public in your web browser

## Register as Admin
Register from localhost/laundry/public/auth/register
Enter your own data there.
Open new tab, then navigate to phpmyadmin or your own dbms ui
Find your data at user table in laundry database
Change id_outlet column in your data row
Change role column from "pelanggan" to "admin" in your data row
Finally, login with your data in localhost/laundry/public/auth/login
