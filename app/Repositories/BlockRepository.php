<?php

namespace App\Repositories;

use App\Models\Block;
use App\Models\BlockType;
use Illuminate\Support\Collection;

class BlockRepository
{
    public function create(BlockType $blockType, int $index): Block
    {
        return Block::create([
            'block_type_id' => $blockType->id,
            'index' => $index,
        ]);
    }

    public function all(string $orderBy = 'index'): Collection
    {
        return Block::orderBy($orderBy)->get();
    }

    public function findById(int $id): Block
    {
        return Block::findOrFail($id);
    }
}
