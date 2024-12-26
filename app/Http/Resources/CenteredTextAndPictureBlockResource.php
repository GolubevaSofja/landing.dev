<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CenteredTextAndPictureBlockResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'centeredPictureBlocks',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'blockTypeID' => $blockData->block_type_id,
            'centeredText' => $blockData->centeredPictureBlocks->first() ? [
                'subheading' => $blockData->centeredPictureBlocks->first()->subheading,
                'heading' => $blockData->centeredPictureBlocks->first()->heading,
                'paragraph' => $blockData->centeredPictureBlocks->first()->paragraph,
                'picture' => $blockData->centeredPictureBlocks->first()->picture,
                'picture_size' => $blockData->centeredPictureBlocks->first()->picture_size,
                'alt_text' => $blockData->centeredPictureBlocks->first()->alt_text,
            ] : null,
        ];
    }
}
