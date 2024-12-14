<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_type_id',
        'index',
    ];

    protected $appends = [
        'type',
    ];

    public function blockType(){
        return $this->belongsTo(BlockType::class);
    }

    public function getTypeAttribute(){
        return $this->blockType->type;
    }

    public function backgrounds(){
        return $this->hasMany(Background::class);
    }

    public function buttons(){
        return $this->hasMany(Button::class);
    }

    public function carousels(){
        return $this->hasMany(Carousel::class);
    }

    public function centeredPictureBlocks(){
        return $this->hasMany(CenteredPictureBlock::class);
    }

    public function columnElements(){
        return $this->hasMany(ColumnElement::class);
    }

    public function dropdownBlocks(){
        return $this->hasMany(DropdownBlock::class);
    }

    public function dropdownBlockElements(){
        return $this->hasMany(DropdownBlockElement::class);
    }

    public function footerBlocks(){
        return $this->hasMany(FooterBlock::class);
    }

    public function headingBlocks(){
        return $this->hasMany(HeadingBlock::class);
    }

    public function headBlocks(){
        return $this->hasMany(HeadBlock::class);
    }

    public function headBlockElements(){
        return $this->hasMany(HeadBlockElement::class);
    }

    public function headingParagraphBlocks(){
        return $this->hasMany(HeadingParagraphBlock::class);
    }

    public function imageLinkElements(){
        return $this->hasMany(ImageLinkElement::class);
    }

    public function paragraphBlock(){
        return $this->hasMany(ParagraphBlock::class);
    }

    public function reviewBlocks(){
        return $this->hasMany(ReviewBlock::class);
    }

    public function getCreatedAtAttribute($value){
        return Carbon::createFromTimestamp(strtotime($value))->format('d.m.Y H:i');
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::createFromTimestamp(strtotime($value))->format('d.m.Y H:i');
    }
}
