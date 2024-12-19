<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlockWithHeadingAndCarouselResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'headingParagraphBlocks',
            'carousels',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'headingParagraph' => $blockData->headingParagraphBlocks->first() ? [
                'heading' => $blockData->headingParagraphBlocks->first()->heading,
                'paragraph' => $blockData->headingParagraphBlocks->first()->paragraph,
            ] : null,
            'carousels' => $blockData->carousels->map(function ($carousel) {
                return [
                    'heading' => $carousel->heading,
                    'paragraph' => $carousel->paragraph,
                    'link' => $carousel->link,
                    'picture' => $carousel->picture,
                ];
            }),
        ];
    }
}
