<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FooterBlockResource extends JsonResource
{
    public function toArray(Request $request = null){
        $block = $this->resource;
        $blockData = $block->load([
            'footerBlocks',
        ]);

        return [
            'id' => $blockData->id,
            'blockIndex' => $blockData->index,
            'blockTypeID' => $blockData->block_type_id,
            'footer' => $blockData->footerBlocks->first() ? [
                'picture' => $blockData->footerBlocks->first()->picture,
                'heading' => $blockData->footerBlocks->first()->heading,
                'paragraph' => $blockData->footerBlocks->first()->paragraph,
                'form_text' => $blockData->footerBlocks->first()->form_text,
                'button_text' => $blockData->footerBlocks->first()->button_text,
                'button_color' => $blockData->footerBlocks->first()->button_color,
                'company_name' => $blockData->footerBlocks->first()->company_name,
                'info' => $blockData->footerBlocks->first()->info,
                'copyrights' => $blockData->footerBlocks->first()->copyrights,
            ] : null,
        ];
    }
}
