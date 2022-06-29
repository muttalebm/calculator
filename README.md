## About Calculator

Calculator is a simple Calculator App for Mathematicians beyond this world

The App demo can be accessed through https://myapp.com
You can also build and run this app on your own local docker server

## Building The App

### Step1

Setup Enviroment Variables

| Env Name                | Value        | Default    | Explaination                            |
|-------------------------|--------------|------------|-----------------------------------------|
| CALC_ADD_ICON           | "👽"         | +          | Icon/Symbol for Addition operator       |
| CALC_ADD_PRECEDENCE     | "1"          | 1          | Precedence of Addition                  |
| CALC_SUB_ICON           | "💀"         | -          | Icon/Symbol for Subtraction operator    |
| CALC_SUB_PRECEDENCE     | "1"          | 1          | Precedence of Addition                  |
| CALC_MULTI_ICON         | "👻"         | *          |                                         |
| CALC_MULTI_PRECEDENCE   | "2"          | 2          |                                         |
| CALC_DIV_ICON           | "😱"         | /          |                                         | 
| CALC_DIV_PRECEDENCE     | "2"          | 2          |                                         |
| API_BASIC_AUTH_USER     | "calculator" | "api"      | Set a Basic Auth user for the API       |
| API_BASIC_AUTH_PASSWORD | "password"   | "password" | Basic Auth Password for the API         |
| USE_PRECEDENCE          | true         | false      | Should the API use Equation Precedence? |

### Step2

To run the application from commandline 
Run `php artisan serve`
note: php >= 8.1.7 required

Running this command will run the application in built in php server @ http://localhost:8000


#### Step2 (optional)

If you love docker, I used laravel sail to build the Application

run the below command
```
./vendor/bin/sail build
./vendor/bin/sail up -d 
```
