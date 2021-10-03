<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dev;
use Illuminate\Support\Facades\Validator;

class DevsController extends Controller
{   
    private $array = ['message' => []];

    public function index(){ 
        return view('app');
    }

    public function all(){
        $devs = Dev::all();

        foreach($devs as $dev){
            $this->array['message'][] = [
                'id' => $dev->id,
                'nome' => $dev->nome,
                'sexo' => $dev->sexo,
                'idade' => $dev->idade,
                'hobby' => $dev->hobby,
                'datanascimento' => $dev->datanascimento
            ];
        }

        return $this->array;
    }

    public function one($id){
        $dev = Dev::find($id);

        if($dev){
            $this->array['message'] = $dev;
        }else{
            return response()->json([
                'message' => 'not_found',
            ], 404);
        }

        return $this->array;
    }

    public function new(Request $request){

        //Recebendo os campos e validando
        $data = $request->only(['nome', 'sexo', 'idade', 'hobby', 'datanascimento']);
        $validator = $this->validator($data);

        //Validando campos e retornando erros
        if($validator->fails()){
            return response()->json([
                'message' => $validator->messages(),
            ], 400);
        }
        

        //Cadastrando dados validados
        $dev = new Dev();
        $dev->nome = $request->input('nome');
        $dev->sexo = $request->input('sexo');
        $dev->idade = $request->input('idade');
        $dev->hobby = $request->input('hobby');
        $dev->datanascimento = $request->input('datanascimento');
        $dev->save();

        $this->array['message'] = [
            'id' => $dev->id,
            'nome' => $request->input('nome'),
            'idade' => $request->input('idade')
        ];

        return response()->json([
            $this->array
        ], 201);
    }

    public function edit(Request $request, $id){
        $data = $request->only(['nome', 'sexo', 'idade', 'hobby', 'datanascimento']);
        $validator = $this->validator($data);

        //Validando campos e retornando erros
        if($validator->fails()){
            return response()->json([
                'message' => $validator->messages(),
            ], 400);
        }

        if($id){

            $dev = Dev::find($id);

            if($dev){
                //salvando dados que foram editados
                $dev->nome = $request->input('nome');
                $dev->sexo = $request->input('sexo');
                $dev->idade = $request->input('idade');
                $dev->hobby = $request->input('hobby');
                $dev->datanascimento = $request->input('datanascimento');
                $dev->save();

                $this->array['message'] = 'Editado com sucesso!';

            }else{
                return response()->json([
                    'message' => 'Id inexistente!',
                ], 400);
            }

        }else{
            return response()->json([
                'message' => 'Id não informado!',
            ], 400);
        }

        return $this->array;
    }

    public function delete($id){
        $dev = Dev::find($id);

        if($dev){
            $dev->delete();
            return response()->json(null, 204);
        }else{
            return response()->json([
                'message' => 'Id inexistente!',
            ], 400);
        }
    }

    protected function validator(array $data)
    {   

        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:100'],
            'sexo' => ['required', 'string','max:9'],
            'idade' => ['required', 'integer'],
            'hobby' => ['required', 'string', 'max:300'],
            'datanascimento' => ['required', 'date'],
        ]);
    }
}
