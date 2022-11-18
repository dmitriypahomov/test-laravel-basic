# Test Laravel Basics

## System Requirements
- PHP >= 8.1
- MySQL >= 5.7

## Install
- `composer install`
- `cp .env.example .env`
- set your DB credentials and mail data in `.env`
- `php artisan key:generate`
- `php artisan migrate --seed`

## Run on local
`npm run dev`

### Additional
Command send mails to posts creators
- `php artisan posts:send_mail_to_creators`
