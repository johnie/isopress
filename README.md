Isopress
========

**Note: This project and its documentation are still under active development, so use it in production on your own risk**

WordPress stack with a good base structure and deployment tool using [Fabric](http://www.fabfile.org/en/latest/) and [Vagrant](http://www.vagrantup.com/). The webserver in use is nginx and more detail about what is installed can you se [here](https://github.com/frozzare/isodev)

### Structure

This is the folder structure. This is not a regular WordPress structure. A config directory where all your WordPress and other configuration exists.

The vendor map is for packages installed with composer and other external packagqes.

The web directory is the custom `wp-content` directory, `controllers` is the theme. No themes directory exists. 

The `views` directory contains twig templates that is renderd with [Timber](http://timber.upstatement.com).

The `lib` directory is the `mu-plugins` directory, so there is where your `functions.php` code will be, since that code will always be loaded.

If you are using external plugins that creates directory in `wp-content` directory then you will have more directories in the web directory and that can be ugly!

The WordPress system has it owns directory `wp` that are inside `web`. Basically you can move the `wp` one level up and configure so it loads the right way. 

```
|-- config
|   |-- environments
|-- tests
	|-- cases
	|-- data
	|-- includes
	|-- wp
|-- vendors
|-- web
	|-- assets
		|-- uploads
	|-- controllers
	|-- lib
	|-- vendor
		  |-- plugins
	|-- views
	|-- wp
```

### Configuration

WP-Cron is disabled and you have to do a cron job on your machine to get it working again or remove the definition that disables WP-Cron.

### Unit Test

Isopress is prepared work with [WordPress Automated Testing](https://make.wordpress.org/core/handbook/automated-testing/). You have to checkout the `wordpress-develop` repository.

```
/path/to/isopress$ svn co https://develop.svn.wordpress.org/trunk/ tests/wp
```

Then you should be able to run `phpunit` in `path/to/isopress` directory. Phpunit is configured to run all tests in `tests/cases` directory.

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

##### iso_current_url

Get the current url. If passing true to the function it will parse the url with `parse_url` and return it as a object. If not it will return it just a string.

`iso_current_url($parse = false)`