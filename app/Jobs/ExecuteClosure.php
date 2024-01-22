<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\QueryException;
use App\Models\Error;
use App\Http\Controllers\ServiceGatewayController;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use App\Events\SendEmailPostClosure;
use App\Events\DebugTables;
class ExecuteClosure implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    
     public $descripcion;
    public function __construct($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Execute the job.
     */
 


    public function handle(): void{
        {
            // Ruta al archivo de dump SQL
        try {
                //code...
           
            $comando = 'export:database';
            Artisan::call($comando);
            $output = Artisan::output();
            $mensajeSinNuevaLinea = str_replace(["\r", "\n"], '', $output);


            if($mensajeSinNuevaLinea =='Backup created successfully' ){
                $rutaArchivoDump = realpath(base_path('app/backups/dump.sql'));

                if (File::exists($rutaArchivoDump)) {
                  
                        // Lee el contenido del archivo de dump
                        $conexionOtraBaseDatos = 'mysql1';
                        DB::setDefaultConnection($conexionOtraBaseDatos);
    
                        $contenidoSQL  = File::get($rutaArchivoDump);
    
                        $dbConfig = Config::get('database.connections.mysql');
                        $host = $dbConfig['host'];
                        $port = $dbConfig['port'];
                        $database = $dbConfig['database'];
                        $username = $dbConfig['username'];
                        $password = $dbConfig['password'];
            
                        // Lee el contenido del archivo SQL
                        $contenidoSQL = File::get($rutaArchivoDump);
            
                        // Reemplaza las credenciales en el archivo SQL
                        $contenidoSQL = str_replace(['{{host}}', '{{port}}', '{{database}}', '{{username}}', '{{password}}'], [$host, $port, $database, $username, $password], $contenidoSQL);
            
                        // Ejecuta las consultas SQL
                        DB::unprepared($contenidoSQL);
    
            
        
                        // Ejecuta las consultas SQL del dump
        
                        Log::info('message: Dump ejecutado con éxito');
                        $conexionOtraBaseDatos = 'mysql';
                        DB::setDefaultConnection($conexionOtraBaseDatos);
                        Event(new DebugTables(env('DB_DATABASE')));
                        Event(new SendEmailPostClosure("SUCCESSFULLY"));
                      
                  
                } else {
                    Log::info('message: El archivo de dump no existe');
                }
                

            }else{
                Log::info('message: Ha ocurrido un error al generar el dump');
                
            }

        } catch (QueryException $e) {
            // Captura cualquier excepción y maneja el error
            $conexionOtraBaseDatos = 'mysql';
            DB::setDefaultConnection($conexionOtraBaseDatos);
            $data = app(ServiceGatewayController::class)->Enrutar(100, $e->getMessage(), __METHOD__, $e->getCode());
            $error = Error::select('subcodigo','descripcion','codigo_error')->where('subcodigo',$data['CodeError'])->get();
            $response = response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
            Log::error('message: Error al ejecutar el dump -'.$response);
            Event(new SendEmailPostClosure("FAILED"));

        }
    
          
        }

        
        

    }

 


        
    }

    