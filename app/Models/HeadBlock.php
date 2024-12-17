<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'bg_color',
        'font_color',
        'meta_name',
        'meta_description',
        'scripts',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
