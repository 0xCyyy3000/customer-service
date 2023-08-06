## EDS Customer Service

#### System requirements

-   PHP > 8.0 version
-   Composer
-   Node
-   MySQL

After downloading the repository, please make sure to install the following system requirements.

### Setting up the Project

Open your project directory in the terminal and run <code>composer install</code> to install the required dependencies.

Once the dependencies has been installed, run <code>npm install</code>
to install the node dependencies.

### Setting up the Enviroment

> Once done installing all the required dependencies, let's now proceed to set-up the **.env** file. In the directory, copy the **.env.example** then paste it and remove the <i>".example"</i> extension.

Enter the command <code> php artisan key:gen </code> to generate an APP_KEY

#### The project will use MySQL for the Database. To setup the database, please input your Database info.

> DB_DATABASE= **{{Database}}** <br>
> DB_USERNAME= **{{UserName}}** <br>
> DB_PASSWORD= **{{Password}}**

Lastly, change the value of APP_NAME. <br>

> APP_NAME = 'EDS - Service Center'

### Migrating the Tables

Once done with your <i>.env</i> setup, it's time to setup also the database.

Enter the command below in the terminal to generate the tables and run the seeder. <br>
<code> php artisan migrate:fresh --seed </code>

### Running the Project

By entering the command <code>php artisan serve</code> the project is now running.
Just open a browser and copy then paste the link from the terminal.

## Contact me

If you're having any issues or questions, feel free to [contact me.](mailto:akosicy3000@gmail.com)
