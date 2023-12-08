<?php 

namespace App\Controller;

use Flight;
use DataBase\QueryBuilder;

class DogController{

    protected $dog;
    public function __construct(){
        $this->dog = new QueryBuilder();
    }
    public function index():void{
        if($this->dog->getAll()){
            $data =[
                'message'=>'Se muestran los datos',
                'data'=>$this->dog->getAll(),
                'status'=>200
             ];
             Flight::json($data);
        }else{
            Flight::json("La data está vacia!");
        }
    }
    public function show($id):void{
        if($this->dog->getId($id)){
            $data =[
                'message'=>'Se muestran los datos',
                'data'=>$this->dog->getId($id),
                'status'=>200
             ];
             Flight::json($data);
        }else{
            Flight::json("El dato consulta no existe!");
        }
    }
    public function store():void{
        //get data of request form
        $request = Flight::request()->data;
        $json= json_encode($request);
        $this->dog->create($json);
        $data =[
            'message'=>'Los datos fueron guardados correctamente',
            'data'=>json_decode($json),
            'status'=>201
         ];
         Flight::json($data);

    }

    public function update($id):void{
        $request = Flight::request()->data;
        $json = json_encode($request);
        try{
                $this->dog->update($id,$json);
                $data =[
                    'message'=>'Los datos fueron actualizados correctamente',
                    'data'=>json_decode($json),
                    'status'=>204
                 ];
                 Flight::json($data);
        }catch(\Exception $e){
            echo "Error : ".$e->getMessage();
        }

    }
    public function destroy ($id):void{
        $this->dog->delete($id);
        $data =[
            'message'=>'Los datos eliminados fueron',
            'status'=>205
         ];
         Flight::json($data);
    }
}