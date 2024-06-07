<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewBlock extends Model
{
    use HasFactory;

    public function countries(){
        return $this->belongsTo(Company::class);
    }

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
