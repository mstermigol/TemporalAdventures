# Temporal Adventures
Temporal Adventures is an online store where you can buy travels to explore iconic moments and ancient civilizations. Discover the richness of our collective heritage and create unforgettable memories with us.

## Documentation
- [Wiki](https://github.com/mstermigol/TemporalAdventures/wiki)

## Run locally
- In order to run the project, you need no install `XAMPP`. Click [here](https://www.apachefriends.org/download.html) to download it.
- Start `Apache` and `MySQL` instances in `XAMPP`.
- Click in the `admin` button next to `MySQL` instance in order to access `phpMyAdmin`.
- Create a new database called `temporal_adventures`.
- Install [composer](https://getcomposer.org/download/)
- Clone the repository.
  
  ```
  git clone https://github.com/mstermigol/TemporalAdventures.git
  ```

- Go to the project directory.
 
  ```
  cd TemporalAdventures
  ```

- Create a `.env ` file and copy the information of the `.env.example`.
- Check the database details (`DB_USERNAME` and `DB_PASSWORD` depending on your own credentials). The database name field should look like this:

   ```
  DB_DATABASE=temporal_adventures
  ```

- Install dependencies.

  ```
  composer install
  composer update
  ```

- Configure the project.

  ```
  php artisan key:generate
  php artisan migrate
  php artisan storage:link
  ```

- Run the `seeders` to generate data into the database.

  ```
  php artisan db:seed --class=Database\Seeders\TravelsTableSeeder
  php artisan db:seed --class=Database\Seeders\UsersTableSeeder
  php artisan db:seed --class=Database\Seeders\CommunityPostsTableSeeder
  php artisan db:seed --class=Database\Seeders\ReviewsTableSeeder
  ```

- Run the `server`.

  ```
  php artisan serve
  ```

## Authors
- `Miguel Jaramillo` - [mstermigol](https://github.com/mstermigol)
- `David Fonseca` - [DavidFonsek](https://github.com/DavidFonsek)
- `Sergio Córdoba` - [sergiocordobam](https://github.com/sergiocordobam)

 
    
