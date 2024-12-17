<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadingBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'subheading',
        'heading',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
