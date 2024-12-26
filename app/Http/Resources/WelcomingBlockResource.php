<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WelcomingBlockResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'headingBlocks',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'blockTypeID' => $blockData->block_type_id,
            'heading' => $blockData->headingBlocks->first() ? [
                'subheading' => $blockData->headingBlocks->first()->subheading,
                'heading' => $blockData->headingBlocks->first()->heading,
            ] : null,
        ];
    }
}
