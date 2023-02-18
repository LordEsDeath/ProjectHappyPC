<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryGames extends Model
{
    use HasFactory;
    protected $table = 'categorygames';
    public $timestamps = true;

    protected $fillable = [
        'categoryName',
        'created_at'
    ];

    public function Games() {
        return $this->hasMany('App\Models\Games');
    }

       public function Gamess() {
        return $this->hasMany(Games::class, 'category_id');
    }
}
