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

        BlockType::create(['type' => 'Navigation block']);
        BlockType::create(['type' => 'Initial block']);
        BlockType::create(['type' => 'Welcoming block']);
        BlockType::create(['type' => 'Trusted organisations block']);
        BlockType::create(['type' => 'Centered text and picture block']);
        BlockType::create(['type' => 'Block with dropdown elements and picture']);
        BlockType::create(['type' => 'Block with heading and column elements / basic']);
        BlockType::create(['type' => 'Block with heading and column elements / bold']);
        BlockType::create(['type' => 'Block with column elements and pictures']);
        BlockType::create(['type' => 'Timeline block']);
        BlockType::create(['type' => 'Reviews block']);
        BlockType::create(['type' => 'Block with heading and carousel']);
        BlockType::create(['type' => 'Block with heading and buttons']);
        BlockType::create(['type' => 'Footer block']);
    }
}
