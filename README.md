## About Estation

This is an API Service which has JSON API and you can create, update, delete, get items.
Also, you are free to search items by any of it's attributes like city or latitude.
There is also you can search and recieve items at any radius and latitude and longtitude you like.

## Install

1) Run composer update
2) Copy .env.example as .env
3) Run this command: php artisan build

## Examples

You can find examples in public/img directory.

## Extensions System

You can create a new extension with 'php artisan make:extension ExtensionName' command.
This will create new template use should to override for your purposes.
Extensions are automatically binded as singlton objects via AppServiceProvider.
You can use Dependency Injection in the project to use it. There is example of implementation you can look at Controller.php.

## Test Records

To make fake records you can use seeder. Use 'php artisan db:seed' command to process new fake records in DB.
There is export file for POSTMAN included in root directory. You can import this file to recieve test samples.

## Search Functionality

You can search stations within a rectangular shape with specified radius.

## Scribe Documentation Generator

You can use 'php artisan scribe:generate' command to regenerate documentation. Can be used as well as a part of CI\CD process.

## THIS IS PET-PROJECT AND NOT IS A SEPARATE ENDED MODULE!!! PLEASE DO NOT USE IT AS A PART OF COMMERCIAL PRODUCT.
