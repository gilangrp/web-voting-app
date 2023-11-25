<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Calon extends Model
{
    use HasFactory;

    protected $table = "calons";
    // error di pr $table = harus sama nama modelnya
    public function calon() {
        return $this->belongsToMany(User::class); 
    }
}
