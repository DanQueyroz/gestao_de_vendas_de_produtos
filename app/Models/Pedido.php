<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedidos';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'cliente_id',
    ];

    // Definindo relação 1:N entre pedidos e produtos
    public function produtos() 
    {
        return $this->hasMany('App\Models\Produto');
    }

    // Definindo relação N:1 entre pedidos e cliente
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
