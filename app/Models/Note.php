<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = "notes";
    protected $fillable = [
        'note',
        'model_id',
    ];
    public function provider(){
        return $this->hasOne(Provider::class, 'model_id');
    }
}
