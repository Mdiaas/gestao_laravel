<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'email', 'uf', 'site'];

    public function produtos()
    {
        //@param1- Modelo que implementa a tabela produtos
        //@param2- chave estrangeira na tabela produtos
        //param3 - chave primaria tabela fornecedor
        return $this->hasMany('App\Models\Item', 'fornecedor_id', 'id');

        //ou
        // return $this->hasMany('App\Models\Item');
    }
}
