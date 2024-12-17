<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture',
        'heading',
        'paragraph',
        'form_text',
        'button_text',
        'button_color',
        'company_name',
        'info',
        'copyrights',
    ];

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
