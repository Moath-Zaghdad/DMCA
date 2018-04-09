# DMCA App


[![MIT License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

### *Under Development*

It's a Laravel WebSite that allows users to create *`Digital Millennium Copyright Act`* requests to prevent copyright infringement


#### Configuration
	

###### Config the ***.env*** file and then Run
```
php artisan key:generate
php artisan migrate --seed
php artisan serv
```

## The Route List

| Method   | URI                    | Name             | Action                                                                 | Middleware   |
| :------- | :--------------------- | :--------------- | ---------------------------------------------------------------------- | :----------- |
| GET|HEAD | /                      |                  | App\Http\Controllers\PagesController@home                              | web          |
| GET|HEAD | api/user               |                  | Closure                                                                | api,auth:api |
| GET|HEAD | home                   | home             | App\Http\Controllers\HomeController@index                              | web,auth     |
| GET|HEAD | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web,guest    |
| POST     | login                  |                  | App\Http\Controllers\Auth\LoginController@login                        | web,guest    |
| POST     | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web          |
| GET|HEAD | notices                | notices.index    | App\Http\Controllers\NoticesController@index                           | web,auth     |
| POST     | notices                | notices.store    | App\Http\Controllers\NoticesController@store                           | web,auth     |
| POST     | notices/confirm        | notices.confirm  | App\Http\Controllers\NoticesController@confirm                         | web,auth     |
| GET|HEAD | notices/create         | notices.create   | App\Http\Controllers\NoticesController@create                          | web,auth     |
| POST     | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web,guest    |
| GET|HEAD | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web,guest    |
| POST     | password/reset         |                  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web,guest    |
| GET|HEAD | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web,guest    |
| GET|HEAD | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web,guest    |
| POST     | register               |                  | App\Http\Controllers\Auth\RegisterController@register                  | web,guest    |





### License

React is [MIT licensed](./LICENSE).
