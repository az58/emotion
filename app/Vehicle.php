<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected  $connection 	= 'mysql';
    protected $table 		= 'vehicle';
    protected $primaryKey 	= 'id';
    public $timestamps 		= true;

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
