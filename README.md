 # Getting Started

-   ### Step 1: Clone the repository <br>

    On your terminal and in your preferred folder, run `https://github.com/LorenzoChukwuebuka/interview-laravel`

    If you don't have git installed in your local system 

    
-   ### Step 2: Install the dependencies <br>

    Navigate into the cloned project directory and install the laravel dependencies using `composer install`. <br> <br>
    Now install the node modules using `npm install`. If you encounter some errors installing the node modules use the force command, run `npm install --force`.

-   ### Step 3: Copy and update environment variables <br>

    Run `cp .env.example .env` to copy the environment variables from the example .env file

-   ### Step 4: Generate APP_KEY and Storage Link <br>

    Run `php artisan key:generate` to generate the key which will be copied instantly to the .env file and then run `php artisan storage:link` to add the storage link to the environment.
