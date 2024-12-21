# Larakidu Package

A Laravel package to streamline the creation of controllers, models, and repositories using customizable stubs.

## Features

•  Generate controllers, models, and repositories with artisan commands.

•  Includes customizable stubs for controller, model, and repository templates.

•  Simplifies repetitive tasks in Laravel development.


## Installation

You can install the package via Composer:

```bash
composer require larakidu/kidu-package

Configuration
Publish the stubs to your stubs/ directory:

php artisan vendor:publish --tag=stubs

This will copy the following stub files to your stubs/ directory:

•  controllerkidu.stub

•  modelkidu.stub

•  repokidu.stub

Commands
After installation, the following artisan commands will be available:

1. 
Make Kidu Controller
Generate a controller with a specific naming convention.

php artisan make:kidu:controller {name}

1. 
Make Kidu Model
Generate a model with a specific naming convention.

php artisan make:kidu:model {name}

1. 
Make Kidu Repository
Generate a repository with a specific naming convention.

php artisan make:kidu:repo {name}
