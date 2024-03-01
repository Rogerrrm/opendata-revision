<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensage extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Nombre de la tabla
    protected $table = 'mensage';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion',
        'ticket_id',
        'user_id'
    ];
}