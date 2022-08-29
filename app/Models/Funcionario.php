<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model{
    use HasFactory;
    protected $table = 'funcionario';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'cpf',
        'rg',
        'nascimento',
        'naturalidade',
        'titulo',
        'zona',
        'secao',
        'municipio',
        'telefone_fixo',
        'celular',
        'observacao',
        'funcao',
        'remuneracao',
        'cep',
        'cidade',
        'bairro',
        'logradouro',
        'numero',
        'complemento'];

}
