<p align="center">
    <img src="./public/img/CharityQ.png" alt="CharityQ Logo"/>
</p>

<p align="center">CharityQ helps caring business managers in streamlining contributions to their community, charities, non-profits, and other organizations. This allows our business partners to operate more efficiently and successfully within their community.</p>

# [CharityQ](https://tagg-uno.herokuapp.com/)

### Executive Summary

Together Achieve Greater Good (TAGG) created an application for businesses to streamline the donation request process for small and large businesses.  When individuals purchase goods and services from a participating business and then share them on social media a donation is made. To take the TAGG application a step further, the TAGG team dreamed of an additional service named CharityQ that could allow the businesses to easily process the donation requests being generated.  This would free the decision makers and business owners to focus more on the business and still support the community by providing donations.

### Setup Requirements
All os
* [Docker](https://www.docker.com/)
    * visit docker development [guide](docker-dev.md) 
* [Visual C++ Redistributable Packages](http://wampserver.aviatechno.net/files/vcpackages/all_vc_redist_x86_x64.zip) 
* [WAMP](http://http://wampserver.aviatechno.net/)
* [Composer](https://getcomposer.org/)
* [Git](https://Git-scm.com/downloads) 
* [npm](https://www.npmjs.com/)

### Installation
To setup local environment follow below steps -

if you are using wamp stack, run below git command within www folder created inside wamp dir -
```bash
Git clone --recursive https://Github.com/SachinPawaskarUNO/tagg.Git
cd tagg
```
Now set Git identity as below -
```bash
Git config --global user.name "John Doe"
Git config --global user.email johndoe@example.com 
```

Where user name and email is your Github user name and email.

#### Update project dependencies

```bash
composer update && npm i
```
The composer & npm commands will update and install all require dependencies to run the development environment.

#### Create Migrate database

create a new database named tagg (or whatever you define in .env file for later use) using phymyadmin. 

```bash
php artisan migrate --seed
```

#### Run the app 
```bash
php artisan key:generate
php artisan serve
```
visit localhost:8000 

### resources
Learn more about [npm](https://docs.npmjs.com/cli/npm), [Git](https://Git-scm.com/docs), [composer](https://getcomposer.org/doc/03-cli.md) and [php artisan](https://laravel.com/docs/5.5/artisan) commands.

### License
TBA

Copyright (c) [University of Nebraska at Omaha](https://www.unomaha.edu/) & [TAGG](http://www.togetheragreatergood.com/)

### Contribute

You can help this project in many ways, such as suggestions, reporting issues and contribute in coding.