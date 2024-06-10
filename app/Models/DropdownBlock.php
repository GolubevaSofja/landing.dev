<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropdownBlock extends Model
{
    use HasFactory;

    public function block(){
        return $this->belongsTo(Block::class);
    }
}