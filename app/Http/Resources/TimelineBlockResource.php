<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimelineBlockResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'dropdownBlocks',
            'dropdownBlockElements',
            'buttons',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'blockTypeID' => $blockData->block_type_id,
            'dropdown' => $blockData->dropdownBlocks->first() ? [
                'picture' => $blockData->dropdownBlocks->first()->picture,
                'picture_size' => $blockData->dropdownBlocks->first()->picture_size,
                'alt_text' => $blockData->dropdownBlocks->first()->alt_text,
                'subheading' => $blockData->dropdownBlocks->first()->subheading,
                'heading_logo' => $blockData->dropdownBlocks->first()->heading_logo,
                'heading' => $blockData->dropdownBlocks->first()->heading,
                'element_type' => $blockData->dropdownBlocks->first()->element_type,
                'orientation' => $blockData->dropdownBlocks->first()->orientation,
                'main_color' => $blockData->dropdownBlocks->first()->main_color,
            ] : null,

            'dropdownElements' => $blockData->dropdownBlockElements->map(function ($dropdownElement) {
                return [
                    'heading' => $dropdownElement->heading,
                    'paragraph1' => $dropdownElement->paragraph1,
                    'paragraph2' => $dropdownElement->paragraph2,
                    'link' => $dropdownElement->link,
                    'link_text' => $dropdownElement->link_text,
                    'index' => $dropdownElement->index,
                    'active_element' => $dropdownElement->active_element,
                ];
            }),
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
