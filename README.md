## Purpose
* [x] Set up the database with Doctrine.
* [X] Run a command which accepts the feed urls(separated by comma) to grab items and save items data into DB.
* [X] Show list of items which were grabbed by running the command line.
* [X] Filter items by category name on the list of items.

## Testing
* **Set up the database with Doctrine:**
   ```
     //Move to directory base-php
     $ cd ../base-php
     //Create DB
     $ php bin/console doctrine:database:create
     //Create table
     $ php bin/console doctrine:schema:update --force
   ```

* **View debug log**
  ```
  // move to base-php directory
  $ cd ../base-php
  // follow debug logs in real time
  $ php bin/console server:log -vvv
  ```

*  **Grab item data**
   ```
   $ cd ../base-php
   // Get item data 
   $ php bin/console grab-item [urls]
   //[urls] single: http://www.feed1.xml
   //[urls] many: http://www.feed2.xml,http://www.feed2.xml,http://www.feed3.xml
   ```
*  **View item data and filter by category name:**
   ```
   //Start server
   $ cd ../base-php
   $ php bin\console server:run
   // display output look like this:
      //[OK] Server listening on http://127.0.0.1:8001
      // Quit the server with CONTROL-C.
   // Access to address: http://127.0.0.1:8001 
    ```
* **Run PHPunit test**
   ```
   // Set up DB test.
   // Please change your config DB test at ../base-php/app/config/config_dev.yml
   $ cd ../base-php
   $ php bin/console doctrine:database:create --env=test
   // Run PHPUnit test (Please make sure you created DB test succesfully)
   $ vendor/bin/phpunit
   // Check report at ../tests/report
    ```
   ![Output report](https://image.prntscr.com/image/KdI_Olh7TPa66BSssqO85w.png)

## Expected date
*  25/12/2017

##  Note
* Please make sure you were set up PHP >= 7.0 and MariaDB =10.1.*
* Please change username and password of DB at `../base-php/app/config/parameters.yml`
* Testing on XAMP
* PLease set up [xdebug](https://gist.github.com/odan/1abe76d373a9cbb15bed) before run PHPUnit
