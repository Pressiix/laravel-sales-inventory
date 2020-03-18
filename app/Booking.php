<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $connection = 'mysql';
    protected $table = 'booking';
}
