Isopress
========

**Note: This project and its documentation are still under active development, so use it in production on your own risk**

WordPress stack with a good base structure and deployment tool using [Fabric](http://www.fabfile.org/en/latest/) and [Vagrant](http://www.vagrantup.com/). The webserver in use is nginx and more detail about what is installed can you se [here](https://github.com/frozzare/isodev)

### Structure

This is the folder structure. This is not a regular WordPress structure. A config directory where all your WordPress and other configuration exists.

The vendor map is for packages installed with composer and other external packages.

The web directory is the custom `wp-content` directory, `views` is the theme. No themes directory exists. The `lib` directory is the `mu-plugins` directory, so there is where your `functions.php` code will be, since that code will always be loaded.

If you are using external plugins that creates directory in `wp-content` directory then you will have more directories in the web directory and that can be ugly!

The WordPress system has it owns directory `wp` that are inside `web`. Basically you can move the `wp` one level up and configure so it loads the right way. 

```
|-- config
|   |-- environments
|-- vendor
|-- web
	|-- assets
	|-- lib
	|-- uploads
	|-- vendor
		  |-- plugins
	|-- views
	|-- wp
```

### Configuration

WP-Cron is disabled and you have to do a cron job on your machine to get it working again or remove the definition that disables WP-Cron.