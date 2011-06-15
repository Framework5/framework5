# Framework5
## PHP5 Web Application Framework


## File structure

The root directory of a Framework5 deployment contains two directories: the html/ folder, also referred to as the web root or public_html on apache servers, and the framework5/ directory, which contains both the framework and application resources.


## Packages

Framework5 uses uses packages to refer to a PHP class in the application. A package is a string that maps to a classes directory and namespace. Framework5 core methods, such as import() and render(), accept packages as parameters. A package name begins with directories that map to a php class starting at the framework5 directory, followed by the class name within its namespace. The decimal point is used as the directory separator in a package name. Lets use an example

ex: core.controller.Framework5\StaticController
- class name: StaticController
- namespace: Framework5
- file location: framework5/core/controller/StaticController.php
- This package name refers to the class StaticController, which is defined in the Framework5 namespace. The first two segments of the package name is the directory that the class file is defined within. 

Note: Only one class should be defined within a file.


## Package Aliases

A package alias can be defined to create an easier way to refer to commonly used packages, such as a site template, or a common data model.

ex: ':userModel' maps to 'site.model.MyApp\UserModel'
	':template' maps to 'site.view.SiteTemplate' //class in global namespace


Defining package aliases ---
To define package aliases, pass an associative array of key value pairs, where the key is the alias and the package name is the value to the define_alias_array method of the core controller PackageManager. This will register all values in the array, and allow them to be used in place of any package name.

ex: \Framework5\PackageManager::define_alias_array(AppSettings::$package_aliases);

How Framework5 handles packages ---
Multiple elements of the framework accept a package name as a parameter. For example, the global function import is used to include resources in an applications execution. When the import method is called, Framework5 will attempt to include the package name passed in the current execution. 








## Global Functions

Global functions are used for many of the core functions of Framework5. These functions are defined in the framework5/core/functions/global.php file, and exist in the global namespace. That being said, these methods are accessible anywhere within a Framework5 application. The global.php file is included from the framework autoloader.


import($package_name) {
	defined in core.controller.Framework5\Factory
	return type boolean
	
	Includes a package in the application. When import is called, it passes the parameters to the Factory::import() static method, which handles file includes and package management. The factory first determines if the package has already been imported, and will return true to avoid duplicate includes without using PHP's require_once call. 
	
	In the case that the package has not yet been imported, the Factory determines if the package name is a valid file path. If the path is invalid, a Framework5\Exception will be thrown with message: "Factory could not load package 'package_name'. because the file does not exist." Otherwise, a valid path name will be passed to the PHP require control structure.
	
	With the file now included in our application, the import method will check to determine if the package class exists within the namespace it was defined in. If the file included does not contain a class by the same name, a Framework5\Exception will be thrown with the error message: "Package was imported, but class 'fully_qualified' does not exist"

}


loaded($package_name) {
	defined in core.controller.Framework5\Factory
	return type boolean
	
	Determines if a package has been imported. The loaded function calls the Framework5\Factory method loaded, which checks the package path against the Factory imported_paths array, that acts as a registry of imported files.

}


implement($object, $interface)
	return type boolean
	
	Returns true if the class name implements the given interface.
	
execute($package_name, $options = null)
	Calls he execute method of a class, if the class implements the interface Framework5\IExecutable
	Additional parameters can be passed to the controller using $options


load_module($package_name)
	

	
render($package_name, $options = null)
	Calls the render method of a View that implements the interface IView

	
instance($package_name)
	Retrieves an instance of a package. If an instance does not exist, one will be created and returned.

	
package_class($package_name)
		
package_base($package_name)
	
package($package_name)
	
set($var)
	Determines if a variable is set.
	
redirect($location)
	Sends redirect header to the given location
	
trace($message)
	Log a debug trace of a value.
	
debug($message)
	Logs a debug message.
	



## Application Routing


## Front Controller

The sites public index.php file is known as the front controller, through which all http requests are handled. The public .htaccess file in Framework5 routes all request that do not match an existing file to the front controller. 

All code in the front controller exists within in a try/catch block, which will handle all Exceptions thrown from the framework or application. 



## Class Descriptions

### core/config

Framework5\Router
	implements: Framework5\IRouter
	description:
	

Framework5\Settings
	description: Framework5 core configuration Settings file.
	

### core/controller

Framework5\ApplicationBase
	extends: StaticController
	file: framework5/core/controller/ApplicationBase.php
	description: serves as a base for Framework5 Applications


Framework5\Controller
	abstract
	file: framework5/core/controller/Controller.php
	description: Base class for core controllers.


Framework5\Database
	extends: \PDO
	file: framework5/core/controller/Database.php
	description: 


Framework5\Debugger
	extends: StaticController
	file: framework5/core/controller/Debugger.php
	description: 
	
	
Framework5\Exception
	file: framework5/core/controller/Exception.php
	description: Provides an extension to create custom Exceptions
	
	
Framework5\Factory
	extends: StaticController
	description: 
	
	
Framework5\Logger
	extends: StaticController
	description: 
	
	
Framework5\Module
	extends: StaticController
	description: 
	
	
Framework5\PackageManager
	extends: StaticController
	description:
	
	
Framework5\Request
	extends: StaticController
	description: the Request controller contains information about the current http request.
	
	
Framework5\StaticController
	description: Base class for core static controllers
	
	
Framework5\View
	extends: StaticController
	description: 

	
	
### core/functions

	
### core/interface


	
### core/model


### core/module



### core/view

Framework5\ExceptionView
	path: framework5/core/view/ExceptionView.php
