<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewsBlockResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'reviewBlocks',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'blockTypeID' => $blockData->block_type_id,
            'review' => $blockData->reviewBlocks->first() ? [
                'picture' => $blockData->reviewBlocks->first()->picture,
                'comment' => $blockData->reviewBlocks->first()->comment,
                'name_surname_position' =>$blockData->reviewBlocks->first()->name_surname_position,
                'stars_number' => $blockData->reviewBlocks->first()->stars_number,
            ] : null,
            'company_id' => $blockData->reviewBlocks->first()->company_id,
        ];
    }
}
