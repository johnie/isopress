Isopress
========

**Note: This project and its documentation are still under active development, so use it in production on your own risk**

WordPress stack with a good base structure and deployment tool using [Fabric](http://www.fabfile.org/en/latest/) and [Vagrant](http://www.vagrantup.com/). The webserver in use is nginx and more detail about what is installed can you se [here](https://github.com/frozzare/isodev)

## ToC
* [Get started](#get-started)
* [Documentation](#documentation)
  * [Configuration files](#configuration-files)
  * [Helper functions](#helper-functions)
  * [Folder structure](#folder-structure)
  * [Composer](#composer)
  * [WP Cron](#wp-cron)
  * [WP-CLI](#wp-cli)

## Get started

Isopress is easy to get started with. Clone the git repository and install all required packages and WordPress with [composer](#composer). Then you can run `vagrant up` to get the Vagrant box up and running.

Using [vassh](https://github.com/x-team/vassh) you can create the database:

```
/path/to/isopress$ vassh "mysql -uroot -proot -e'create database isopress'"
```

And then install the WordPress site:

```
/path/to/isopress$ vassh "wp core install --title='Isopress' --admin_user='admin' --admin_password='password' --admin_email='my-email@gmail.com' --url='dev.isopress.com'"
```

Then you should be able to access your WordPress site on [dev.isopress.com](http://dev.isopress.com)

## Documentation

### Composer

WordPress and some required plugins and other packages are installed with [composer](https://getcomposer.org/).

Example:

```
/path/to/isopress$ composer install
```

### Configuration files

TBA.

### Helper functions

##### iso_is_post_stype

Check if the post or the current post has the given post type. Will return true or false.

`iso_is_post_stype([$id,] $post_type)`

##### iso_is_method

Check if request method is the same as the given method. Will return true or false.

`iso_is_method($method)`

##### iso_remove_trailing_quotes

Remove trailing dobule or/and single quote. Will return string without trailing quotes.

`iso_remove_trailing_quotes($str)`

Example:

```
iso_remove_trailing_quotes('\"hello\"') => '"hello"'
```

##### iso_current_url

Get the current url. If passing true to the function it will parse the url with `parse_url` and return it as a object. If not it will return it just a string.

`iso_current_url($parse = false)`

### Folder structure

Below this text you can se the folder structure. This is not a regular WordPress structure. A config directory where all your WordPress and other configuration exists.

The vendor map is for packages installed with composer and other external packagqes.

The web directory is the custom `wp-content` directory, `controllers` is the theme. No themes directory exists. 

The `views` directory contains twig templates that is renderd with [Timber](http://timber.upstatement.com).

The `lib` directory is the `mu-plugins` directory, so there is where your `functions.php` code will be, since that code will always be loaded.

If you are using external plugins that creates directory in `wp-content` directory then you will have more directories in the web directory and that can be ugly!

The WordPress system has it owns directory `wp` that are inside `web`. Basically you can move the `wp` one level up and configure so it loads the right way. 

```
|-- config
    |-- application.php
	|-- environment.php
	|-- environments
		|-- development.php
		|-- production.php
		|-- staging.php
	|-- tests.php
|-- tests
	|-- cases
		|-- test-example.php
	|-- data
	|-- includes
		|-- bootstrap.php
		|-- loader.php
	|-- wp
|-- vendors
|-- web
	|-- assets
		|-- css
		|-- images
		|-- js
		|-- uploads
	|-- controllers
		|-- index.php
		|-- page.php
		|-- single.php
		|-- style.css
	|-- lib
		|-- application.php
		|-- assets.php
		|-- isopress
		|-- isopress.php
	|-- vendor
		  |-- plugins
	|-- views
		|-- base.twig
		|-- index.twig
		|-- page.twig
		|-- single.twig
		|-- partials
			|-- footer.twig
			|-- head.twig
	|-- wp
```

### Unit Test

Isopress is prepared work with [WordPress Automated Testing](https://make.wordpress.org/core/handbook/automated-testing/). You have to checkout the `wordpress-develop` repository.

```
/path/to/isopress$ svn co https://develop.svn.wordpress.org/trunk/ tests/wp
```

Then you should be able to run `phpunit` in `path/to/isopress` directory. Phpunit is configured to run all tests in `tests/cases` directory.

### WP-Cron

WP-Cron is disabled and you have to do a cron job on your machine to get it working again or remove the definition that disables WP-Cron.

### WP CLI

Isopress works with [WP-CLI](http://wp-cli.org) just like any other WordPress project would. Isopress includes `wp-cli.yml` configuration file and is configure to run in `web/wp` directory. Use this config file for any further [configuration](http://wp-cli.org/config/).

You can use [vassh](https://github.com/x-team/vassh) to run WP CLI command outside of Vagrant or use [wp-cli-ssh](https://github.com/x-team/wp-cli-ssh).

Example:

```
/path/to/isopress$ vassh wp post list
+----+--------------+-------------+---------------------+-------------+
| ID | post_title   | post_name   | post_date           | post_status |
+----+--------------+-------------+---------------------+-------------+
| 1  | Hello world! | hello-world | 2014-10-26 08:23:10 | publish     |
+----+--------------+-------------+---------------------+-------------+
Connection to 127.0.0.1 closed.
```