# IdentityMapping

Getting Started:

* Have `docker` and `docker-compose` installed
* In the main directory of the project, copy the `.env.example` to just a file called `.env`
  * This is where environment-specific and sensitive information is stored (usernames, passwords, etc.)
* To start the application, run `docker-compose up` which will start a container to serve the files
* While the server is running, get into another terminal, in the project directory and run `docker-compose exec bash` to attach to a terminal inside the running development container
* Make sure you have application dependencies installed `composer install`
* Generate a site key: `php artisan key:generate`
* You should now be able to browse to your localhost server, by default: `localhost:3000` and see the start page
* To compile javascript assets (e.g. if any fancy scripting langauges are required):
  * Run `npm install` inside the container
  * Run `npm run dev` inside the container to compile for the dev environment
  * Any future assets can be added to the webpack compilation list inside `webpack.mix.js`
  * See [here](https://laravel.com/docs/6.x/mix) for more about the asset pipeline
