<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture',
        'comment',
        'name_surname_position',
        'stars_number',
        'company_id'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function block(){
        return $this->belongsTo(Block::class);
    }
}
