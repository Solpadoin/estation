## About Estation

This is an API Service which has JSON API and you can create, update, delete, get items.
Also, you are free to search items by any of it's attributes like city or latitude.
There is also you can search and recieve items at any radius and latitude and longtitude you like.

## Examples

You can find examples in public/img directory.

## Extensions System

You can create a new extension with 'php artisan make:extension ExtensionName' command.
This will create new template use should to override for your purposes.
Extensions are automatically binded as singlton objects via AppServiceProvider.
You can use Dependency Injection in the project to use it. There is example of implementation you can look at Controller.php.

## Test Records

To make fake records you can use seeder. Use 'php artisan db:seed' command to process new fake records in DB.

## Search Functionality

You can search stations within a rectangular shape with specified radius.

## THIS IS PET-PROJECT AND NOT IS A SEPARATE ENDED MODULE!!! PLEASE DO NOT USE IT AS A PART OF COMMERCIAL PRODUCT.
