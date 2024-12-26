<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrustedOrganizationsBlockResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'paragraphBlock',
            'imageLinkElements',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'blockTypeID' => $blockData->block_type_id,
            'paragraph' => $blockData->paragraphBlock->paragraph,
            'imageLinkElements' => $blockData->imageLinkElements->map(function ($element) {
                return [
                    'picture' => $element->picture,
                    'link' => $element->link,
                    'index' => $element->index,
                ];
            }),
        ];
    }
}
