<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use Illuminate\Console\Command;


/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');




Artisan::command('logs:clear', function() {
    
    exec('echo "" > ' . storage_path('logs/laravel.log'));
    $this->info('Logs have been cleared');
   
    
})->describe('Clear log files');


Artisan::command("export:database", function(){
    $host = config('database.connections.mysql.host');
    $port = config('database.connections.mysql.port');
    $database = config('database.connections.mysql.database');
    $username = config('database.connections.mysql.username');
    $password = config('database.connections.mysql.password');

    // Ruta donde se almacenará el archivo de respaldo
    $backupPath =  '';

    $mysqlExecutable = 'mysqldump';


    // Nombre del archivo de respaldo
    $backupFileName = '\dump.sql';

    // Comando mysqldump
    $command = sprintf(
        '%s -h%s -P%s -u%s -p%s --no-create-info --skip-triggers --complete-insert --skip-extended-insert  %s > %s',
        $mysqlExecutable,
        $host,
        $port,
        $username,
        $password,
        $database,
        '/APPFHOPE/app/backups' .$backupFileName
    );

    
    // Ejecutar el comando mysqldump
    exec($command, $output, $resultCode);

    if ($resultCode === 0) {
        $this->comment('Backup created successfully');

    } else {
        $this->error('Error creating backup');
    }
   
});