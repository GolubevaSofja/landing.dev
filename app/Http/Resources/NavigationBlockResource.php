<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NavigationBlockResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'headBlocks',
            'headBlockElements',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'blockTypeID' => $blockData->block_type_id,
            'headBlock' => $blockData->headBlocks->first() ? [
                'logo' => $blockData->headBlocks->first()->logo,
                'bg_color' => $blockData->headBlocks->first()->bg_color,
                'font_color' => $blockData->headBlocks->first()->font_color,
                'meta_name' => $blockData->headBlocks->first()->meta_name,
                'meta_description' => $blockData->headBlocks->first()->meta_description,
                'scripts' => $blockData->headBlocks->first()->scripts,
            ] : null,
            'headBlockElements' => $blockData->headBlockElements->map(function ($element) {
                return [
                    'name' => $element->name,
                ];
            }),
        ];
    }
}
