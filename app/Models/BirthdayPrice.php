<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BirthdayPrice extends Model
{
    protected $table = 'birthday_prices';
    public $timestamps = true;

    protected $primaryKey = 'id';
    protected $fillable = [ 'birthday', 'price', 'currency'];
}
