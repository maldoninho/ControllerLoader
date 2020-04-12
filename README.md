# Maldoninho-Routes

Router is a simple class to routing the application using url's to drive the user interface.

## Reequire the ROUTES class

```php
require "./maldoninho/ControllerLoader/ControllerLoader.php";
```

### DEFINE THE CONST PATH AND NAMESPACE FOR CONTROLLER TO LOAD THE CONTROLLER CLASS
 
 ```php
define("CONTROLLER_LOADER_PATHS", [
    "controllersPath" => __DIR__ . '/app/controllers/',
    "namespace" => "\\App",
]);
```

### PASS THE ROUTES TO THE CLASS CONTROLLER LOADER 

```php
define("ROUTES", [
    "controller" => "home",
    "action" => "index",
]);
```

### CALL THE CLASS

```php
ControllerLoader::run(ROUTES, CONTROLLER_LOADER_PATHS);
```

### Requirements

DB requires PHP 5.2 or greater.

## License

DB is released under the [MIT] https://opensource.org/licenses/mit-license.php license.