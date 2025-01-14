<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeadingParagraphBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'paragraph',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
