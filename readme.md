# NSCL Chess

## Installation
The following assumes Windows, but I'm sure this is easily adaptable for OSX/Linux.  This was performed by me November of 2020.

1. Install PHP, Apache and MySQL at a minimum.  I just used XAMPP for this with the default settings:  https://www.apachefriends.org/index.html and some of my other directions depend on this.  You may need to adapt as needed to your environment.
2. If you used XAMPP to install the above then this step is tricky - this app was built with Laravel 4, which unfortunately is very old now.  It required the mcrypt extension for PHP, which XAMPP doesn't include because later versions of Laravel don't use it, and it is deprecated.  However, when you go to install the dependencies later, composer will complain you don't have it if you don't install it.  To install it:
- Find the PHP version (for me at this writing it was 7.4) and grab the associated version of the DLL for Windows here:  https://pecl.php.net/package/mcrypt/1.0.3/windows.  (I used the Thread Safe version)
- Move the files into the `/xampp/php/ext/` directory - will depend on where XAMPP gets installed
- Enable the extension in the `xampp/php/php.ini` file.  To do this, look for a bunch of lines in the file like this `extension=xxx` and add the following:
```
; Needed for Laravel 4
extension=mcrypt
```
3. Install composer: https://getcomposer.org/download/. I used the windows installer for this, but I'm sure the CLI method would be fine too.  Make sure you add php to your PATH when it asks you to do so.
4. In a new terminal window, run `composer install`.  This should download Laravel and all of it's dependencies.
5. Start Apache and MySQL, using the XAMPP control panel (or however these services are managed on your system)
6. Create a database in MySQL called `laravel`
7. Run `php artisan migrate`
8. Run `php artisan serve`

Notes
- The way Laravel 4 handles exceptions does not play nice with migrations.  If any error is thrown while trying to run a migration, you'll get a weird and not very helpful `PHP Fatal error:  Uncaught TypeError: Argument 1 passed to Illuminate\Exception\WhoopsDisplayer::display() must be an instance of Exception, instance of ParseError given`.  It's a disconnect between later versions of PHP and this old version of Laravel.  I had to hack the following onto this file to get useful information: `vendor\laravel\framework\src\Illuminate\Exception\Handler.php`:
```
/**
	 * Handle the given exception.
	 *
	 * @param  \Exception  $exception
	 * @param  bool  $fromConsole
	 * @return void
	 */
	protected function callCustomHandlers($exception, $fromConsole = false)
	{
		echo $exception;  // <---- Add this to see the exception
		return $exception;  // <---- return it to avoid the class mismatch

    // ... rest of code
```
- I had to add a few migrations because the app expected tables that the migrations didn't create, so I created them.  The artisan CLI - `php artisan list` and https://laravel.com/docs/4.2/artisan was pretty useful.
- Some columns that were being sorted on but weren't specified in a schema anywhere were just removed (win_pct for teams).

