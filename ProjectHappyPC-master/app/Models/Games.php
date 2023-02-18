<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
   use HasFactory;
    protected $table = 'games';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'image',
        'datecreate',
        'category_id',
        'company',
        'created_at'
    ];

    public function CategoryGames()
    {
        return $this->belongsTo('App\Models\CategoryGames', 'category_id');
    }

}
