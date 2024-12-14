<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColumnElement extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture',
        'picture_position',
        'header',
        'paragraph',
        'index',
        'width',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
