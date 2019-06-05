<p align="center"><img src="./public/images/dowell.png"></p>

## Project Information

Dowell Analytics is a web application which visualizes company data. The application is developed on Laravel Framework (v5.8.17) and VueJS (v2.0+)

## Technology

-   [Laravel Framework 5.8](https://laravel.com/docs/5.8/installation).
-   [VueJS 2.0](https://vuejs.org/v2/guide).
-   [Microsoft SQL Server](https://docs.microsoft.com/en-us/sql/sql-server/sql-server-technical-documentation?view=sql-server-2017).

## Local Host Installation (Windows)

Prerequisites:

-   [XAMPP](https://www.apachefriends.org/index.html).
-   [Git Terminal](https://git-scm.com/downloads).
-   [PHP 7.3.5](https://www.php.net/releases/7_3_5.php).
-   [NodeJS](https://nodejs.org/en/download/).
-   [Composer](https://getcomposer.org/download/).

0.  Start XAMPP Apache Server

1.  Clone the repository in xampp/htdocs folder:

        git clone https://github.com/andrewauxilio/dowell_analytics.git

1.  Install all laravel dependencies:

        composer install

1.  Copy the .env file and modify .env variables accordingly:

        cp .env.example .env

1.  Generate application key:

        php artisan key:generate

1.  Install front-end dependencies:

        npm install

1.  Compile front-end source (live mode or dev mode):

        npm run production
        npm run watch

1.  Set-up local server:

        php artisan serve

1.  Access application on web browser:

        http://127.0.0.1:<portnumber>

## Developers

Contact Us:
[Dowell Website](http://www.dowell.com.au/).

-   **[Andrew Auxilio](http://www.dowell.com.au/)**
-   **[Mark Greenwood](http://www.dowell.com.au/)**
-   **[Manoj Mishra](http://www.dowell.com.au/)**
-   **[Jim Konstas](http://www.dowell.com.au/)**
