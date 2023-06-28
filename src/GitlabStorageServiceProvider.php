<?php

namespace RoyVoetman\LaravelGitlabStorage;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use RoyVoetman\FlysystemGitlab\Client;
use RoyVoetman\FlysystemGitlab\GitlabAdapter;

class GitlabStorageServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        Storage::extend('gitlab', function ($app, $config) {
            $client = new Client(
                $config[ 'project-id' ],
                $config[ 'branch' ],
                $config[ 'base-url' ],
                $config[ 'personal-access-token' ]
            );

            $adapter = new GitlabAdapter($client);
            $operator = new Filesystem($adapter);

            return new FilesystemAdapter($operator, $adapter);
        });
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        //
    }
}
