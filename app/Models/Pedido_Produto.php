<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido_Produto extends Model
{
    use HasFactory;

    protected $table = 'pedidos_produtos';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantidade',
        'pedido_id',
        'produto_id'
    ];

    // Definindo relação 1:N entre pedidos e produtos
    public function produtos() 
    {
        return $this->hasMany('App\Models\Produto');
    }
}