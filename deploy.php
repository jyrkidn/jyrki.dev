<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('application', 'jyrki.dev');
set('deploy_path', '/var/www/{{application}}');
set('repository', 'git@github.com:jyrkidn/jyrki.dev.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('jyrki.dev')
    ->setRemoteUser('root');

// Tasks

task('build', function () {
    cd('{{release_path}}');
    run('npm run build');
});

after('deploy:failed', 'deploy:unlock');

/**
 * Main deploy task.
 */
desc('Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:cache',
    'artisan:migrate',
    'deploy:publish',
]);
