## About Calculator

Calculator is a simple Calculator App for Mathematicians beyond this world

The App demo can be accessed through https://myapp.com
You can also build and run this app on your own local docker server

## Building The App

### Step1

Setup Environment Variables in .env file

An example .env.example file is already setup.

You can run
```
cp .env.example .env
```

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
Run 
```
composer install
npm install && npm run prod
php artisan key:generate
php artisan serve
```
note: php >= 8.1 required

Running this command will run the application in built in php server @ http://localhost:8000


#### Step2 (optional)

If you love docker, I used laravel sail to build the Application

run the below command
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
    
./vendor/bin/sail build
./vendor/bin/sail up -d 
```

## Approach
When you visit the home page of the application, a calculator UI will be shown. Users can use the mouse to run their calculations.
Once the user clicks on the `=` button an API will be called in the backend to parse and calculate the equation. The api responds with the Result which is then rendered to the UI

The UI takes each button click and stores in an array which is passed to the backend API, the Backend API parses the Array to a proper quation and runs the arithmetic operations accordingly.

Note: if precedence is important for the admin, set USE_PRECEDENCE=true. By enabling this variable, the API will use RPN (Reverse Polish Notiation) to parse the input equation then run the arithmetic operations according to their precedence  
