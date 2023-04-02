# Topup-Tracker

This web software which finds out the top 10 users who have most topup at the previous day

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP 8 or higher
- Composer

### Installing

1. Clone the repository: `git clone https://github.com/tr-shishir/topup-tracker.git`
2. Navigate to the project directory: ```cd topup-tracker```
3. Install PHP dependencies: ```composer install```
4. Rename the `.env.example` file to `.env`
5. Generate a new application key: `php artisan key:generate`
6. Set up your database in the `.env` file: `DB_CONNECTION=mysql` `DB_HOST=127.0.0.1` `DB_PORT=3306` `DB_DATABASE=your_database_name` `DB_USERNAME=your_database_username` `DB_PASSWORD=your_database_password` 
    - Change you queue driver to Database 
    `QUEUE_CONNECTION=database`
7. Migrate the database: `php artisan migrate --seed`
    - You can run a command that creates 500 fake user accounts and 200,000 pretend top-up transactions that happened either yesterday or today and belongs to the 500 user. 
    - Another way to do this is to import a file called `topup.sql` from the root folder.
8. Once the seeding or importing process is completed, you may execute the command `php artisan calculate:topup-users` to perform the top-up users calculation.
9. Start the development server: `php artisan serve`


### Requirement for server/local side

- The process that will run every day first hour automatically and get top 10 topup Users, you need a Scheduler.

1.`For Scheduler:` 

    1.1 If you are in Local server in your local device, then you must need to run a command in your terminal `php artisan schedule:work`.
    
        - With this you can run your scheduler until it find any schedule to run. Also you you can run the commands needs to run manually in your terminal. Commands you can find from `app\Console\Kernel.php`
        
    1.2 If you are in live server, then you must need to set a cron Job with `* * * * *` cron expression. 
    
        - This command will run the scheduler every minute `* * * * * php /path/to/artisan schedule:run`
        
- The process that initiate manually and get top 10 topup Users (btn:Re-Calculate Top-Up), to achive that you need a Queue driver setup. Because of more then 200,000 you have to search it will take a long time for user. But queue will do it in background so that user must not see the page is looooooaaaading. 

2.`For Job Dispatched:` 

    2.1 If you are in Local server in your local device, then you must need to run a command in your terminal `php artisan queue:work`.
    
        - With this you can run your worker.
        
    2.2 If you are in live server, then you must need to set a cron Job with `* * * * *` cron expression. 
    
        - This command will run the scheduler every minute `* * * * * php /path/to/artisan queue:work`
        
        - Alternative you can use Supervisor to run your workers.

Now you are ready to Go.

### Thanks

