<?php

namespace App\Factories;

use App\Models\Block;

class BlockElementFactory
{
    public function createBlockWithColumnsAndPictures(Block $block, string $paragraph, array $columns): void
    {
        $block->paragraphBlock()->create([
            'paragraph' => $paragraph,
        ]);

        foreach ($columns as $column) {
            $block->columnElements()->create($column);
        }
    }

    public function createBlockWithDropdownsAndPictures(Block $block, array $dropdown, array $dropdownElements, array $buttons): void
    {
        $block->dropdownBlocks()->create($dropdown);

        foreach ($dropdownElements as $element) {
            $block->dropdownBlockElements()->create($element);
        }

        foreach ($buttons as $button) {
            $block->buttons()->create($button);
        }
    }

    public function createBlockWithHeadingAndButtons(Block $block, array $headingParagraph, array $buttons) :void
    {
        $block->headingParagraphBlocks()->create($headingParagraph);

        foreach ($buttons as $button) {
            $block->buttons()->create($button);
        }
    }

    public function createBlockWithHeadingAndCarousels(Block $block, array $headingParagraph, array $carousels):void
    {
        $block->headingParagraphBlocks()->create($headingParagraph);

        foreach ($carousels as $carousel) {
            $block->carousels()->create($carousel);
        }
    }

    public function createBlockWithHeadingAndColumnsBasic(Block $block, array $heading, array $columnElements):void
    {
        $block->headingBlocks()->create($heading);

        foreach ($columnElements as $columnElement) {
            $block->columnElements()->create($columnElement);
        }
    }

    public function createBlockWithHeadingAndColumnsBold(Block $block, array $heading, array $columnElements):void
    {
        $block->headingBlocks()->create($heading);

        foreach ($columnElements as $columnElement) {
            $block->columnElements()->create($columnElement);
        }
    }

    public function createCenteredTextAndPictureBlock(Block $block, array $centeredText):void
    {
        $block->centeredPictureBlocks()->create($centeredText);
    }

    public function createFooterBlock(Block $block, array $footer):void
    {
        $block->footerBlocks()->create($footer);
    }

    public function createInitialBlock(Block $block, array $headingParagraph, array $buttons):void
    {
        $block->headingParagraphBlocks()->create($headingParagraph);

        foreach ($buttons as $button) {
            $block->buttons()->create($button);
        }
    }

    public function createNavigationBlock(Block $block, array $headBlock, array $headBlockElements):void
    {
        $block->headBlocks()->create($headBlock);

        foreach ($headBlockElements as $headBlockElement) {
            $block->headBlockElements()->create($headBlockElement);
        }
    }

    public function saveReviewsBlock(Block $block, array $review):void
    {
        $block->reviewBlocks()->delete();
        $block->reviewBlocks()->create($review);
    }

    public function createTimelineBlock(Block $block, array $dropdown, array $dropdownElements, array $buttons):void
    {
        $block->dropdownBlocks()->create($dropdown);

        foreach ($dropdownElements as $element) {
            $block->dropdownBlockElements()->create($element);
        }

        foreach ($buttons as $button) {
            $block->buttons()->create($button);
        }
    }

    public function createTrustedOrganizationsBlock(Block $block, string $paragraph, array $imageLinkElements):void
    {
        $block->paragraphBlocks()->create([
           'paragraph' => $paragraph,
        ]);

        foreach ($imageLinkElements as $element) {
            $block->imageLinkElements()->create($element);
        }
    }

    public function createWelcomingBlock(Block $block, array $heading):void
    {
        $block->headingBlocks()->create($heading);
    }
}
