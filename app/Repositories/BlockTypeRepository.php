<?php

namespace App\Repositories;

use App\Models\BlockType;
use Illuminate\Database\Eloquent\Collection;

class BlockTypeRepository
{
    public function findByType(string $type): ?BlockType
    {
        return BlockType::where('type', $type)->first();
    }

    public function all(): Collection
    {
        return BlockType::all();
    }
}
