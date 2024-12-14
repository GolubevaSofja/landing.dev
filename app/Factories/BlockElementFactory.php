<?php

namespace App\Factories;

use App\Models\Block;

class BlockElementFactory
{
    public function createBlockWithColumnsAndPictures(Block $block, string $paragraph, array $columns): void
    {
        $block->headingParagraphBlocks()->create([
            'paragraph' => $paragraph,
        ]);

        foreach ($columns as $column) {
            $block->columnElements()->create($column);
        }
    }
}
