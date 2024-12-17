<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropdownBlockElement extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'paragraph1',
        'paragraph2',
        'link',
        'link_text',
        'index',
        'active_element',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
