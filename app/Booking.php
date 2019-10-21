<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Booking extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql';
    protected $table = 'booking';
    protected $primaryKey = 'id';
    public $timestamps = true;
  

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
