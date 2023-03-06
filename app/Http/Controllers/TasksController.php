<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Tasks;
use App\Services\Auth\LoginService;
use Exception;


class TasksController extends Controller
{

    public function getAllTasks(){

    
        if (Auth()->user()){

            $result = Tasks::select('tasks.*')
            ->get();
            return response()->json(
                ["message" => "Todas as tarefas",
                "error" => "false",
                "code" => 200,
                "results" => $result->all()
                ]);

        //Caso o usuário não esteja autenticado       
        }else{
            return response()->json(
                ["message" => "Nao Autorizado",
                "error" => "true",
                "code" => 401
                ]);


        }

    }
   

    public function getTaskById($id){


        if (Auth()->user()){

            //Verificando a Existência da Tarefa pelo ID
            //Só entra na condição se encontrar o ID
            if (Tasks::where('task_id', $id)->first()) {
            
                $result = Tasks::select('tasks.*')
                ->get()
                ->where('task_id','=',$id);
        
                return response()->json(
                    ["message" => "Detalhes da tarefa",
                    "error" => "false",
                    "code" => 200,
                    "results" => $result->all()
                    ]);

            }else{

                return response()->json(
                    ["message" => "Nao encontrado",
                    "error" => "true",
                    "code" => 404
                    ]);
                
            }
     
        //Caso o usuário não esteja autenticado
        }else{

            return response()->json(
                ["message" => "Nao Autorizado",
                "error" => "true",
                "code" => 401
                ]);
    
        }
    }

    public function create(Request $request){


        if (Auth()->user()){

            $data = $request->all();

            try { 

                //se for inserido um ID, retornar erro
                if ($request->task_id){

                    return response()->json(
                        ["message" => "Id não pode ser passado",
                        "error" => "true",
                        "code" => 200,
                        "results" => $result->all()
                        ]);
        
                }


                DB::table('tasks')->insert([$data]);
                        
                return response()->json(
                    ["message" => "Tarefa criada com sucesso",
                    "error" => "false",
                    "code" => 200,
                    "results" => $request->all()
                    ]);

            } catch (\Exception $error) {
    
                    return response()->json(
                        ["message" => "Erro",
                        "error" => "true",
                        "code" => 400
                        ]);
                }


        //Caso o usuário não esteja autenticado
        }else{

            return response()->json(
                ["message" => "Nao Autorizado",
                "error" => "true",
                "code" => 401
                ]);

        }

       

    }

    public function update(Request $request, $id){


        if (Auth()->user()){

            try { 

                //Só entra na condição se encontrar o ID
                if (Tasks::where('task_id', $id)->first()) {
                    
                    $task = DB::table('tasks')
                    ->where('task_id', '=', $id)
                    ->update(['task_title' => $request->task_title]);
            

                    return response()->json(
                        ["message" => "Tarefa editada com sucesso",
                        "error" => "false",
                        "code" => 200,
                        "results" => $request->all()
                        ]);

                }else{

                    return response()->json(
                        ["message" => "Nao encontrado",
                        "error" => "true",
                        "code" => 404
                        ]);
                    
                }


            

            } catch (\Exception $error) {
    
                return response()->json(
                    ["message" => "Erro",
                    "error" => "true",
                    "code" => 400
                    ]);
            }

        //Caso o usuário não esteja autenticado    
        }else{
            return response()->json(
                ["message" => "Nao Autorizado",
                "error" => "true",
                "code" => 401
                ]);
        }


    }


    public function delete(Request $request, $task_id){


        if (Auth()->user()){

            try {        

                //Só entra na condição se encontrar o ID
                if (Tasks::where('task_id', $task_id)->first()) {
                
                    $deleted = DB::table('tasks')->where("task_id",'=', $task_id)->delete();            
        
                    return response()->json(
                        ["message" => "Tarefa deletada com sucesso",
                        "error" => "false",
                        "code" => 200]
                    );                    

                }else{

                    return response()->json(
                        ["message" => "Nao encontrado",
                        "error" => "true",
                        "code" => 404
                        ]);
                    
                }
    
            } catch (\Exception $error) {
    
                return response()->json(
                    ["message" => $error,
                    "error" => "true",
                    "code" => 400
                    ]);
            }

            
        //Caso o usuário não esteja autenticado
        }else{

            return response()->json(
                ["message" => "Nao Autorizado",
                "error" => "true",
                "code" => 401
                ]);
    
        }
    }
       
}
