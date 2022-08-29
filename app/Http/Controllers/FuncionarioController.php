<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller{
    public function lista(){
        $title = "Funcionários";
        return view('funcionario.lista')->with(compact('title'));
    }

    public function add(){
        $title = "Funcionários";
        return view('funcionario.add')->with(compact('title'));
    }

    public function todosFuncionarios(Request $request){
        $columns = array(
            0 =>'nome',
            1 =>'funcao',
        );

        $totalData = Funcionario::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value'))){
            $funcionarios = Funcionario::offset($start)->limit($limit)->orderBy($order,$dir)->get();
        }
        else{
            $search = $request->input('search.value');
            $funcionarios =  Funcionario::where('nome','LIKE',"%{$search}%")
                                    ->offset($start)
                                    ->limit($limit)
                                    ->orderBy($order,$dir)
                                    ->get();
            $totalFiltered = Funcionario::where('nome','LIKE',"%{$search}%")->count();
        }
        $data = array();

        if(!empty($funcionarios)){
            foreach ($funcionarios as $funcionario){
                $perfil ="<div class=\"symbol symbol-circle symbol-50px overflow-hidden me-3\">
                    <a href=\"../../demo1/dist/apps/user-management/users/view.html\">
                        <div class=\"symbol-label\">
                            <img src=\"assets/media/avatars/300-6.jpg\" alt=\"".$funcionario->nome."\" class=\"w-100\" />
                        </div>
                    </a>
                </div>
                <div class=\"d-flex flex-column\">
                    <a href=\"../../demo1/dist/apps/user-management/users/view.html\" class=\"text-gray-800 text-hover-primary mb-1\">Emma Smith</a>
                    <span>".$funcionario->cpf."</span>
                </div>";
                $nestedData['nome'] = $perfil; 
                $nestedData['funcao'] = $funcionario->funcao;
                $nestedData['dTrabalhados'] = 3;
                $nestedData['uDiaTrabalhado'] = date("d/m/Y");
                if($funcionario->status == 0){
                    $nestedData['status'] = "<div class=\"badge badge-light-success fw-bold\">Trabalhando</div>";
                }else{
                    $nestedData['status'] = "<div class=\"badge badge-light-danger fw-bold\">Desligado</div>";
                }
                $nestedData['opcoes'] = "<a href=\"#\" class=\"btn btn-light btn-active-light-primary btn-sm\" data-kt-menu-trigger=\"click\" data-kt-menu-placement=\"bottom-end\">Ações
                <span class=\"svg-icon svg-icon-5 m-0\">
                    <svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                        <path d=\"M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z\" fill=\"currentColor\" />
                    </svg>
                </span>
                <div class=\"menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4\" data-kt-menu=\"true\">
                    <div class=\"menu-item px-3\">
                        <a href=\"../../demo1/dist/apps/user-management/users/view.html\" class=\"menu-link px-3\">Editar</a>
                    </div>
                    <div class=\"menu-item px-3\">
                        <a href=\"#\" class=\"menu-link px-3\" data-kt-users-table-filter=\"delete_row\">Arquivar</a>
                    </div>
                </div>";

                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        echo json_encode($json_data);
    }

}
