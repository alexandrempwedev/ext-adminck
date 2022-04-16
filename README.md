<h1 align="center"> admin-ck </h1>

<p align="center">ckeditor & ckfinder for laravel-admin ^laravel7</p>

## Installing

```shell
composer require xn/ext-adminck
```

```shell
php artisan vendor:publish --tag=admin-ck
```

## Usage

```php
$form->ckuploader('image', '封面');
$form->ckeditor('content', '內容');
```

配置文件在 config/ckfinder.php

## Contributing

## License

MIT
