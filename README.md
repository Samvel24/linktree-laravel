# Linktree clone
 
Linktree clone created with the Laravel framework (With the help of the tutorial: https://www.youtube.com/watch?v=30qk04BG9G4)
 
 
### SET UP
* Requirements
	1. Apache/2.4.33 or greater.
	2. MariaDB 10.1.32 or greater.
	3. PHP/7.2.5 or greater.
    4. To verify these requirements see:
        * [XAMPP readme file](https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.2.5/) and 
        * [Laravel installation](https://laravel.com/docs/7.x/installation)
  
* App Configuration
    1. Add host `linktree.samuel.localhost`,
        see [Edit hosts](https://dinahosting.com/ayuda/como-modificar-el-fichero-hosts).
    2. Create `.env` file from `.env.example` and set it.
    3. Set `DB_DATABASE=root_linktree` in `.env` file.
    4. Run `php artisan key:generate` to get an application key in `.env` file.
	5. Run `composer install`.
	6. Run `php artisan migrate`.
    7. Run `npm install` [(for install NPM dependencies like Vue, Axios, jQuery, etc)](https://laravel.com/docs/7.x/mix#installation).
    8. Run `npm run dev` (for buil NPM dependencies)


* App sections
    1. Browse the website [linktree.samuel.localhost](http://linktree.samuel.localhost).
    2. Login at [linktree.samuel.localhost/login](http://linktree.samuel.localhost/login).
    3. Register at [linktree.samuel.localhost/register](http://linktree.samuel.localhost/register).
    4. See a user's links at [linktree.samuel.localhost/{username}](http://linktree.samuel.localhost/{username}).
 
### CONTRIBUTION: Guidelines & Documentation
* Git :
    [Gitflow](http://nvie.com/posts/a-successful-git-branching-model).
* Back End:
    [Laravel 7.x](https://laravel.com/docs/7.x),
* Front End:
    [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction),
 
***
 
2021 [Samuel Ramirez](https://github.com/Samvel24/)