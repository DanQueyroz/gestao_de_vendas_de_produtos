<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'email',
        'cpf',
    ];

    // Definindo relação 1:N entre clientes  e pedidos
    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}
