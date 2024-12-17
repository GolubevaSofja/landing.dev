<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageLinkElement extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture',
        'link',
        'index',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
