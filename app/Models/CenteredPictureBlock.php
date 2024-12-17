<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenteredPictureBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'subheading',
        'heading',
        'paragraph',
        'picture',
        'picture_size',
        'alt_text',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
