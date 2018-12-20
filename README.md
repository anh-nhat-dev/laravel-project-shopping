# Requirements
- Php >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

# Install
- Step 1: Clone project from github
```
$ git clone https://github.com/nhatkaka95/laravel-project-shopping.git
$ cd laravel-project-shopping
```
- Step 2: Install Package composer
```
$ composer install
```
- Step 3: Copy file `.env.example` and rename to `.env`
```
$ cp .env.example .env
```
- Step 4: Set the application key
```
$ php artisan key:generate
```
- Step 5: Configure the database connection in the `.env` file
- Step 6: Start Server
```
$ php artisan serve
```
