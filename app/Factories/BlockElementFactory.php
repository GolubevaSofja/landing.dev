<?php

namespace App\Factories;

use App\Models\Block;

class BlockElementFactory
{
    public function saveBlockWithColumnsAndPictures(Block $block, string $paragraph, array $columns): void
    {
        $block->paragraphBlocks()->delete();
        $block->paragraphBlocks()->create([
            'paragraph' => $paragraph,
        ]);

        $block->columnElements()->delete();
        foreach ($columns as $column) {
            $block->columnElements()->create($column);
        }
    }

    public function saveBlockWithDropdownsAndPictures(Block $block, array $dropdown, array $dropdownElements, array $buttons): void
    {
        $block->dropdownBlocks()->delete();
        $block->dropdownBlocks()->create($dropdown);

        $block->dropdownBlockElements()->delete();
        foreach ($dropdownElements as $element) {
            $block->dropdownBlockElements()->create($element);
        }

        $block->buttons()->delete();
        foreach ($buttons as $button) {
            $block->buttons()->create($button);
        }
    }

    public function saveBlockWithHeadingAndButtons(Block $block, array $headingParagraph, array $buttons) :void
    {
        $block->headingParagraphBlocks()->delete();
        $block->headingParagraphBlocks()->create($headingParagraph);

        $block->buttons()->delete();
        foreach ($buttons as $button) {
            $block->buttons()->create($button);
        }
    }

    public function saveBlockWithHeadingAndCarousels(Block $block, array $headingParagraph, array $carousels):void
    {
        $block->headingParagraphBlocks()->delete();
        $block->headingParagraphBlocks()->create($headingParagraph);

        $block->carousels()->delete();
        foreach ($carousels as $carousel) {
            $block->carousels()->create($carousel);
        }
    }

    public function saveBlockWithHeadingAndColumnsBasic(Block $block, array $heading, array $columnElements):void
    {
        $block->headingBlocks()->delete();
        $block->headingBlocks()->create($heading);

        $block->columnElements()->delete();
        foreach ($columnElements as $columnElement) {
            $block->columnElements()->create($columnElement);
        }
    }

    public function saveBlockWithHeadingAndColumnsBold(Block $block, array $heading, array $columnElements):void
    {
        $block->headingBlocks()->delete();
        $block->headingBlocks()->create($heading);

        $block->columnElements()->delete();
        foreach ($columnElements as $columnElement) {
            $block->columnElements()->create($columnElement);
        }
    }

    public function saveCenteredTextAndPictureBlock(Block $block, array $centeredText):void
    {
        $block->centeredPictureBlocks()->delete();
        $block->centeredPictureBlocks()->create($centeredText);
    }

    public function saveFooterBlock(Block $block, array $footer):void
    {
        $block->footerBlocks()->delete();
        $block->footerBlocks()->create($footer);
    }

    public function saveInitialBlock(Block $block, array $headingParagraph, array $buttons):void
    {
        $block->headingParagraphBlocks()->delete();
        $block->headingParagraphBlocks()->create($headingParagraph);

        $block->buttons()->delete();
        foreach ($buttons as $button) {
            $block->buttons()->create($button);
        }
    }

    public function saveNavigationBlock(Block $block, array $headBlock, array $headBlockElements):void
    {
        $block->headBlocks()->delete();
        $block->headBlocks()->create($headBlock);

        $block->headBlockElements()->delete();
        foreach ($headBlockElements as $headBlockElement) {
            $block->headBlockElements()->create($headBlockElement);
        }
    }

    public function saveReviewsBlock(Block $block, array $review):void
    {
        $block->reviewBlocks()->delete();
        $block->reviewBlocks()->create($review);
    }

    public function saveTimelineBlock(Block $block, array $dropdown, array $dropdownElements, array $buttons):void
    {
        $block->dropdownBlocks()->delete();
        $block->dropdownBlocks()->create($dropdown);

        $block->dropdownBlockElements()->delete();
        foreach ($dropdownElements as $element) {
            $block->dropdownBlockElements()->create($element);
        }

        $block->buttons()->delete();
        foreach ($buttons as $button) {
            $block->buttons()->create($button);
        }
    }

    public function saveTrustedOrganizationsBlock(Block $block, string $paragraph, array $imageLinkElements):void
    {
        $block->paragraphBlocks()->delete();
        $block->paragraphBlocks()->create([
           'paragraph' => $paragraph,
        ]);

        $block->imageLinkElements()->delete();
        foreach ($imageLinkElements as $element) {
            $block->imageLinkElements()->create($element);
        }
    }

    public function saveWelcomingBlock(Block $block, array $heading):void
    {
        $block->headingBlocks()->delete();
        $block->headingBlocks()->create($heading);
    }
}
