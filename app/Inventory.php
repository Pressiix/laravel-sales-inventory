<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'id',
        'web',
        'month',
        'year',
        'section',
        'type',
        'inventory',
        'available'
    ];
    
    protected $connection = 'mysql';
    protected $table = 'inventory';
}
