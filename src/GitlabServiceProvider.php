<?php

namespace RoyVoetman\LaravelGitlabStorage;

use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use RoyVoetman\FlysystemGitlab\Client;
use RoyVoetman\FlysystemGitlab\GitlabAdapter;

class GitlabServiceProvider {
    
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        Storage::extend('gitlab', function ($app, $config) {
            $client = new Client(
                $config[ 'personal-access-token' ],
                $config[ 'project-id' ],
                $config[ 'branch' ],
                $config[ 'base-url' ]
            );
        
            return new Filesystem(new GitlabAdapter($client));
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