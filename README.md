# Laravel Gitlab storage
A Gitlab Storage driver for Laravel

[![Latest Version](https://img.shields.io/packagist/v/royvoetman/laravel-gitlab-storage.svg?style=flat-square)](https://packagist.org/packages/royvoetman/laravel-gitlab-storage)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/royvoetman/laravel-gitlab-storage.svg?style=flat-square)](https://packagist.org/packages/royvoetman/laravel-gitlab-storage)

## Installation

This package is a wrapper bridging [Flysystem-Gitlab-storage](https://github.com/RoyVoetman/Flysystem-Gitlab-storage) into Laravel as an available storage disk.

```bash
composer require royvoetman/laravel-gitlab-storage
```

Add a new disk to your filesystems.php config

```php
'gitlab' => [
    'driver'                => 'gitlab',
    'personal-access-token' => env('GITLAB_ACCESS_TOKEN', ''), // Personal access token
    'project-id'            => env('GITLAB_PROJECT_ID'), // Project id of your repo
    'branch'                => env('GITLAB_BRANCH', 'master'), // Branch that should be used
    'base-url'              => env('GITLAB_BASE_URL', 'https://gitlab.com'), // Base URL of Gitlab server you want to use
],
```

### Access token (required for private projects)
Gitlab supports server side API authentication with Personal Access tokens

For more information on how to create your own Personal Access token: [Gitlab Docs](https://docs.gitlab.com/ee/user/profile/personal_access_tokens.html)

### Project ID
Every project in Gitlab has its own Project ID. It can be found at to top of the frontpage of your repository. [See](https://stackoverflow.com/questions/39559689/where-do-i-find-the-project-id-for-the-gitlab-api#answer-53126068)

### Base URL
This will be the URL where you host your gitlab server (e.g. https://gitlab.com)

## Usage
```php
$disk = Storage::disk('gitlab');

// create a file
$disk->put('images/', $fileContents);

// check if a file exists
$exists = $disk->exists('file.jpg');

// copy a file
$disk->copy('old/file1.jpg', 'new/file1.jpg');

// move a file
$disk->move('old/file1.jpg', 'new/file1.jpg');

// See https://laravel.com/docs/filesystem for a full list of all the available functionality
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Contributions are **welcome** and will be fully **credited**. We accept contributions via Pull Requests on [Github](https://github.com/RoyVoetman/laravel-gitlab-storage).

### Pull Requests

- **[PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)** - The easiest way to apply the conventions is to install [PHP Code Sniffer](http://pear.php.net/package/PHP_CodeSniffer).
- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.
- **Create feature branches** - Don't ask us to pull from your master branch.
- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
