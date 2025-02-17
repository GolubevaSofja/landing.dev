<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockType extends Model
{
    use HasFactory;

    public function blocks(){
        return $this->hasMany(Block::class);
    }
}
