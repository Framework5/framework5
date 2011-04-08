#Framework5

## Description
Framework5 is a lightweight object oriented framework designed for rapid application development. The goal is to create a framework that provides a rich feature set with customizable tools, and allows developers to create applications without conforming to a multitude framework guidelines.



## Features

### Multiple Application Support
Framework5 allows you to create multiple Applications to handle requests from the Front Controller. For example, you  can create a new application called APIApplication that handles all requests from the uri site.com/api. All other requests will be passed to the default Application.

### Packages
Class management via packages. A package is a string location that maps to an object. Alternately, you can define a package alias in the Framework5\Settings class that maps to a defined package name. For example, you can map a package 'site.controller.Messages' to the alias ':message', and use :message in place of the fully qualified package name in function such as import() and instance().

### Debugging
The Debugger utility can be used to aid you through the development process. Global functions such as debug() and trace() can be used to help you understand your application as it executes. The debugger can be disabled by changing the configuration variable in the Framework5\Settings class.

### Localization
The localization module (core.module.localization) can be used to define application content in multiple languages, and provides a simple api to format and display in the users native language.



## Development
Framework5 is currently in active development. All code should be considered experimental and is not recommended for production application.



## Documentation
As Framework5 is currently in development, all code documentation is provided within the source code.



## Author
Created by Tyler Matthews ([http://tmatthewsdev.com/](http://tmatthewsdev.com/)) during final project at Full Sail University for WDD Social