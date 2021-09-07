# How to install the project

Recommended PHP version: `8.0`

1. Enter the project folder
```
cd project
```

2. Install composer dependencies
```
composer install
```

3. Run the project
```
php artisan serve
```

### Run automated tests
```
vendor/bin/phpunit
```
or
```
composer run-script test
```

### Manually testing the api
#### Test with Insomnia
* Open insomnia and import the `insomnia.json` file
  
##### Now you can do 3 different tests adding different files to the `sales`'s request body:

1. Test with `sales.txt` file for a successfull response.
2. Test with `invalidFile.txt` file for an invalid value response.
3. Test with `invalidFile2.png` file for an invalid file type response.

### Test by yourself
Just make a `post` call to the `/sales` endpoints sending the `sales.txt` file in a field with name `file`