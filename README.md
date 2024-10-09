## Installation 
(these installation steps are for Laravel Sail):

1. composer install
2. cp .env.example.sail .env
3. Set all the default environment variables in .env file, like DB_*,
4. set `COIN_API_KEY` (default is demo version, should be usable)
5. `php artisan key:generate`
6. `php artisan jwt:secret`
7. `./vendor/bin/sail up -d`
8. `sail artisan migrate`
9. `sail artisan app:import-currencies`
10. `sail npm i`
11. `sail npm run build`
12. visit `http://localhost`


## Errors
during `sail artisan app:import-currencies` I got an error:

```
cURL error 6: Could not resolve host: api.coingecko.com (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) for https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd
```

But I am assuming it's problem with my WSL2/Docker setup. I cannot test it further.

If you somehow get the same error, please go to `\App\Providers\CurrencyDataProviderServiceProvider`
and swap data provider binding.

