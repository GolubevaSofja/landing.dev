<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlockWithHeadingAndButtonsResource extends JsonResource
{
    public function toArray(Request $request = null)
    {
        $block = $this->resource;
        $blockData = $block->load([
            'headingParagraphBlocks',
            'buttons',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'headingParagraph' => $blockData->headingParagraphBlocks->first() ? [
                'heading' => $blockData->headingParagraphBlocks->first()->heading,
                'paragraph' => $blockData->headingParagraphBlocks->first()->paragraph,
            ] : null,
            'buttons' => $blockData->buttons->map(function ($button) {
                return [
                    'text' => $button->text,
                    'link' => $button->link,
                    'color' => $button->color,
                    'icon' => $button->icon,
                ];
            }),
        ];
    }
}
