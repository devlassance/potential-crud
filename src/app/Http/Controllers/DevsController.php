<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dev;
use Illuminate\Support\Facades\Validator;

class DevsController extends Controller
{   
    private $result = ['result' => []];

    public function all(){
        $devs = Dev::all();

        foreach($devs as $dev){
            $this->array['result'][] = [
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
            $this->array['result'] = $dev;
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

        $this->array['result'] = [
            'id' => $dev->id,
            'nome' => $request->input('nome'),
            'idade' => $request->input('idade')
        ];

        return $this->array;
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
