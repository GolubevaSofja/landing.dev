<?php

namespace App\Http\Controllers;

use App\Factories\BlockElementFactory;
use App\Http\Requests\BlockRequest;
use App\Http\Resources\BlockWithColumnElementsAndPicturesResource;
use App\Repositories\BlockRepository;
use App\Repositories\BlockTypeRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use App\Models\Block;
use Inertia\Inertia;

class BlockController extends Controller
{
    private const BLOCK_WITH_COLUMNS_AND_PICTURES = 'Block with column elements and pictures';
    private const BLOCK_WITH_DROPDOWNS_AND_PICTURES = 'Block with dropdown elements and picture';
    private const BLOCK_WITH_HEADING_AND_BUTTONS = "Block with heading and buttons";
    private const BLOCK_WITH_HEADING_AND_CAROUSELS = "Block with heading and carousel";
    private const BLOCK_WITH_HEADING_AND_COLUMNS_BASIC = "Block with heading and column elements / basic";
    private const BLOCK_WITH_HEADING_AND_COLUMNS_BOLD = "Block with heading and column elements / bold";
    private const BLOCK_WITH_CENTERED_TEXT_AND_PICTURE = "Centered text and picture block";
    private const FOOTER_BLOCK = 'Footer block';
    private const INITIAL_BLOCK = "Initial block";
    private const NAVIGATION_BLOCK = "Navigation block";
    private const REVIEWS_BLOCK = "Reviews block";
    private const TIMELINE_BLOCK = "Timeline block";
    private const TRUSTED_ORGANIZATIONS_BLOCK = "Trusted organisations block";
    private const WELCOMING_BLOCK = "Welcoming block";




    public function __construct(
        private BlockTypeRepository $blockTypeRepository,
        private BlockRepository $blockRepository,
        private BlockElementFactory $blockElementFactory,
        private CompanyRepository $companyRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Dashboard', [
            'blocks' => $this->blockRepository->all(),
        ]);
    }

    public function homeView(): \Inertia\Response
    {
        return Inertia::render('HomePage', [
            'blockTypes' => $this->blockTypeRepository->all(),
            'companies' => $this->companyRepository->all(),
        ]);
    }

    public function getTableName()
    {
        return (new Block())->getTable();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(BlockRequest $request)
    {
        $blockType = $this->blockTypeRepository->findByType($request->input('blockType'));
        $block = $this->blockRepository->create($blockType, (int) $request->input('blockIndex'));
        $message = 'Block created successfully';

        switch ($blockType->type) {
            case self::BLOCK_WITH_COLUMNS_AND_PICTURES:
                $this->blockElementFactory->createBlockWithColumnsAndPictures(
                    $block,
                    $request->input('paragraph'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_DROPDOWNS_AND_PICTURES:
                $this->blockElementFactory->createBlockWithDropdownsAndPictures(
                    $block,
                    $request->input('dropdown'),
                    $request->input('dropdownElements'),
                    $request->input('buttons'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_BUTTONS:
                $this->blockElementFactory->createBlockWithHeadingAndButtons(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('buttons'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_CAROUSELS:
                $this->blockElementFactory->createBlockWithHeadingAndCarousels(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('carousels'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BASIC:
                $this->blockElementFactory->createBlockWithHeadingAndColumnsBasic(
                    $block,
                    $request->input('heading'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BOLD:
                $this->blockElementFactory->createBlockWithHeadingAndColumnsBold(
                    $block,
                    $request->input('heading'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_CENTERED_TEXT_AND_PICTURE:
                $this->blockElementFactory->createCenteredTextAndPictureBlock(
                    $block,
                    $request->input('centeredText'),
                );
                break;
            case self::FOOTER_BLOCK:
                $this->blockElementFactory->createFooterBlock(
                    $block,
                    $request->input('footer'),
                );
                break;
            case self::INITIAL_BLOCK:
                $this->blockElementFactory->createInitialBlock(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('buttons'),
                );
                break;
            case self::NAVIGATION_BLOCK:
                $this->blockElementFactory->createNavigationBlock(
                    $block,
                    $request->input('headBlock'),
                    $request->input('headBlockElements'),
                );
                break;
            case self::REVIEWS_BLOCK:
                $review = $request->input('review');
                $companyId = $request->input('company_id');
                $companyData = $request->input('company');

                if (!$companyId && $companyData) {
                    $company = $this->companyRepository->create(
                        $companyData['name'],
                        $companyData['logo']
                    );
                    $companyId = $company->id;
                }

                $review['company_id'] = $companyId;

                $this->blockElementFactory->saveReviewsBlock($block, $review);

                break;
            case self::TIMELINE_BLOCK:
                $this->blockElementFactory->createTimelineBlock(
                    $block,
                    $request->input('dropdown'),
                    $request->input('dropdownElements'),
                    $request->input('buttons'),
                );
                break;
            case self::TRUSTED_ORGANIZATIONS_BLOCK:
                $this->blockElementFactory->createTrustedOrganizationsBlock(
                    $block,
                    $request->input('paragraph'),
                    $request->input('imageLinkElements'),
                );
                break;
            case self::WELCOMING_BLOCK:
                $this->blockElementFactory->createWelcomingBlock(
                    $block,
                    $request->input('heading'),
                );
                break;

            default:
                $message = 'This block type is not supported';
        }

        return Inertia::render('HomePage', [
            'blockTypes' => $this->blockTypeRepository->all(),
            'message' => $message,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $block = $this->blockRepository->findById($id);
        $blockType = $block->getTypeAttribute();

        switch ($blockType) {
            case self::BLOCK_WITH_COLUMNS_AND_PICTURES:
                $blockData = new BlockWithColumnElementsAndPicturesResource($block);
                break;
            case self::BLOCK_WITH_DROPDOWNS_AND_PICTURES:
            case self::BLOCK_WITH_HEADING_AND_BUTTONS:
            case self::BLOCK_WITH_HEADING_AND_CAROUSELS:
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BASIC:
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BOLD:
            case self::BLOCK_WITH_CENTERED_TEXT_AND_PICTURE:
            case self::FOOTER_BLOCK:
            case self::INITIAL_BLOCK:
            case self::NAVIGATION_BLOCK:
            case self::REVIEWS_BLOCK:
            case self::TIMELINE_BLOCK:
            case self::TRUSTED_ORGANIZATIONS_BLOCK:
            case self::WELCOMING_BLOCK:
            default:
                $message = 'This block type is not supported';
        }

        return Inertia::render('BlockEdit', [
            'block' => $blockData->toArray(),
            'blockType' => $blockType,
            'blockTypes' => $this->blockTypeRepository->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Block $block)
    {
        dd($block, $request->input());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $block = $this->blockRepository->findById($id);

        $block->delete();

        return Inertia::render('Dashboard', [
            'message' => 'Block deleted successfully',
        ]);
    }
}
