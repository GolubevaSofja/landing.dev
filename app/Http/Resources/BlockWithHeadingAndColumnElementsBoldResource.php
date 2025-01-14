<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlockWithHeadingAndColumnElementsBoldResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'headingBlocks',
            'columnElements',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'blockTypeID' => $blockData->block_type_id,
            'heading' => $blockData->headingBlocks->first() ? [
                'subheading' => $blockData->headingBlocks->first()->subheading,
                'heading' => $blockData->headingBlocks->first()->heading,
            ] : null,
            'columnElements' => $blockData->columnElements->map(function ($columnElement) {
                return [
                    'picture' => $columnElement->picture,
                    'picture_position' => $columnElement->picture_position,
                    'header' => $columnElement->header,
                    'paragraph' => $columnElement->paragraph,
                    'index' => $columnElement->index,
                    'width' => $columnElement->width,
                ];
            }),
        ];
    }
}
