<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropdownBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture',
        'picture_size',
        'alt_text',
        'subheading',
        'heading_logo',
        'heading',
        'element_type',
        'orientation',
        'main_color',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
