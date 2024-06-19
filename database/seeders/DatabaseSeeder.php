<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ColumnElement;
use App\Models\Block;
use App\Models\ReviewBlock;
use App\Models\HeadBlockElement;
use App\Models\ParagraphBlock;
use App\Models\ImageLinkElement;
use App\Models\HeadingParagraphBlock;
use App\Models\HeadingBlock;
use App\Models\HeadBlock;
use App\Models\FooterBlock;
use App\Models\DropdownBlockElement;
use App\Models\DropdownBlock;
use App\Models\CenteredPictureBlock;
use App\Models\Carousel;
use App\Models\Button;
use App\Models\Background;
use App\Models\Company;
use App\Models\BlockType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        BlockType::create(['type' => 'partner block']);
        BlockType::create(['type' => 'impact block']);
        BlockType::create(['type' => 'team block']);
        BlockType::create(['type' => 'companies']);
        BlockType::create(['type' => 'backgrounds']);
        BlockType::create(['type' => 'buttons']);
        BlockType::create(['type' => 'column elements']);
        BlockType::create(['type' => 'head block']);
        BlockType::create(['type' => 'head block elements']);
        BlockType::create(['type' => 'heading paragraph block']);
        BlockType::create(['type' => 'heading block']);
        BlockType::create(['type' => 'paragraph block']);
        BlockType::create(['type' => 'image link elements']);
        BlockType::create(['type' => 'centered picture block']);
        BlockType::create(['type' => 'dropdown block']);
        BlockType::create(['type' => 'dropdown block elements']);
        BlockType::create(['type' => 'review block']);
        BlockType::create(['type' => 'footer block']);
        BlockType::create(['type' => 'carousel']);
    }
}
