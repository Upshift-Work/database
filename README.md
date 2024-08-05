# Laravel Postgres Extended

> This project is a fork of [`bosnadev/database`](https://github.com/bosnadev/database). Since the original project
> appears to be abandoned, this fork will be maintained until the original project is updated. If the original project
> is updated, this fork will be archived in favor of the original project.
> 
> Note that backwards compatibility is **not** guaranteed. If you are using this fork, you should be using it in an
> environment running modern versions of PHP and Laravel. For now, this means PHP `8.1+` and Laravel `10.0+`.

## Introduction

An extended PostgreSQL driver for Laravel 10 with support for some additional PostgreSQL data types:
hstore, uuid, geometric types (point, path, circle, line, polygon...)

## Installation  

Add the following to your `composer.json` file to ensure that the package is installed from this fork:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/BrekiTomasson/database.git"
    }
  ]
}
```        

Update your dependency constraint to reference this branch:

```json
{
  "require": {
    "bosnadev/database": "dev-master"
  }
}
```
