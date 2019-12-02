# IdentityMapping

Getting Started:

* Have `docker` and `docker-compose` installed
* In the main directory of the project, copy the `.env.example` to just a file called `.env`
  * This is where environment-specific and sensitive information is stored (usernames, passwords, etc.)
* To start the application, run `docker-compose up` which will start a container to serve the files
* While the server is running, get into another terminal, in the project directory and run `docker-compose exec myapp bash` to attach to a terminal inside the running development container
* Make sure you have application dependencies installed `composer install`
* Generate a site key: `php artisan key:generate`
* You should now be able to browse to your localhost server, by default: `localhost:3000` and see the start page
* To compile javascript assets (e.g. if any fancy scripting langauges are required):
  * Run `npm install` inside the container (only once)
  * Run `npm run dev` inside the container to compile for the dev environment (every time make a change)
  * Any future assets can be added to the webpack compilation list inside `webpack.mix.js`
  * See [here](https://laravel.com/docs/6.x/mix) for more about the asset pipeline


Using Laravel: 

* Creating a new page
 * Add a new route to the web.php
 * Make a new blade.php file corresponding to the name used in the new route
    * Using `@extends('layouts.app')`at the beginning of the function calls the template for the webpage, which brings header, body, progress bar, and the navigation links.
    * Using `@section('content')`, fill the rest of the page with the old HTML code, keeping aware of the inherited items above. End the section with @endsection
    * For any JavaScript code, make a new section with 'javascript' instead of 'content', and fill with the HTML script link. 
        * The JS file itself needs to be in the resources/js folder to be accessed with `{{ asset('js/example.js') }}`
        
        
