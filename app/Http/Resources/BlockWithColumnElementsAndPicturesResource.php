<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlockWithColumnElementsAndPicturesResource extends JsonResource
{
    public function toArray(Request $request = null)
    {
        $block = $this->resource;
        $blockData = $block->load([
            'paragraphBlock',
            'columnElements',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'paragraph' => $blockData->paragraphBlock->paragraph,
            'columnElements' => $blockData->columnElements->map(function ($columnElement) {
                return [
                    'picture' => $columnElement->picture,
                    'picture_position' => $columnElement->picture_position,
                    'header' => $columnElement->heading,
                    'paragraph' => $columnElement->paragraph,
                    'index' => $columnElement->index,
                    'width' => $columnElement->width,
                ];
            }),
        ];
    }
}
