<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos()
    {
        // return $this->belongsToMany('App\Models\Produto', 'pedidos_produtos');
        return $this->belongsToMany('App\Models\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at');
        // param 1 -> modelo do relacionamento NxN
        // param 2 -> tabela auxiliar de relacionamento
        // param 3 -> nome da chave estrangeira da tabela mapeada pelo modelo
        // param 4 -> fk da tabela mapeada pelo modelo utilizado no relacionamento
    }
}
