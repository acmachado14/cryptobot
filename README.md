<p align="center">
  <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" width="80px"/>
  <br>
</p>
<div align=center>
    <a href="#desc">Description</a> | <a href="#prerequisites">Prerequisites</a> | <a href="#api">Api</a> | <a href="#running">Running</a> | <a href="#principles">Principles</a> | <a href="#designPatterns">Design Patterns</a> | <a href="#methodologiesDesigns">Methodologies & Designs</a> | <a href="#librariesFrameworks">Libraries and Frameworks</a>
</div>
<br>
<hr>
<h2 id="desc">
    Description
</h2>

Aplication to notify user about cryptocoins developed using [PHP 8.0](https://www.php.net/) and Observer Pattern
- - -

<h2 id="prerequisites">
  Prerequisites
</h2>


- [Git](https://git-scm.com/download/), [Docker](https://docs.docker.com/get-docker/) and [Docker-Compose](https://docs.docker.com/compose/install/) installed.
- Create an account at [SendGrid](https://sendgrid.com/) and generete a free Api key
- - - -

<h2 id="api">
    API
</h2>

- To send a email [SendGrid](https://sendgrid.com/)
- To get current coin value [Mercado Bitcoin](https://www.mercadobitcoin.com.br/api-doc/)
- - -

<h2 id="running">
  Running the project
</h2>

All commands below are done in the terminal


**1** - Clone the repository and access the directory created by the clone:

```sh
git clone https://github.com/acmachado14/cryptobot.git && cd cryptobot
```

**2** - Fill the environment variables in docker-compose.yml:

```sh
- EMAIL_API= your_email
- SENDGRID_API_KEY= api_key
```

**3** - Start the application and exec php container:

```sh
docker-compose up -d && docker exec -it cryptobot bash
```

**4** - Install Composer dependences and create the database:

```sh
composer install && vendor/bin/doctrine orm:schema-tool:create
```

**5** - Finally run the project:
```sh
php index.php
```
- - - -

<h2 id="principles">
 Principles
</h2>

* Single Responsibility Principle (SRP)
* Open Closed Principle (OCP)
* Liskov Substitution Principle (LSP)
* Interface Segregation Principle (ISP)
* Dependency Inversion Principle (DIP)

- - -

<h2 id="designPatterns">
 Design Patterns
</h2>

* Factory
* Observer
* Dependency Injection

- - -

<h2 id="methodologiesDesigns">
 Methodologies and Designs
</h2>

* Clean Architecture
* DDD
* TDD

- - -

<h2 id="librariesFrameworks">
 Libraries and Frameworks
</h2>

* Php
* Git
* Docker
* MySql
* Composer
* Doctrine
* Guzzlehttp
* Symfony
* Sendgrid
* PHPUnit
