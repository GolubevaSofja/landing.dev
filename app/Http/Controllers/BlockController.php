<?php

namespace App\Http\Controllers;

use App\Factories\BlockElementFactory;
use App\Http\Requests\BlockRequest;
use App\Http\Resources\BlockWithColumnElementsAndPicturesResource;
use App\Http\Resources\BlockWithDropdownElementsAndPictureResource;
use App\Http\Resources\BlockWithHeadingAndButtonsResource;
use App\Http\Resources\BlockWithHeadingAndCarouselResource;
use App\Http\Resources\BlockWithHeadingAndColumnElementsBasicResource;
use App\Http\Resources\BlockWithHeadingAndColumnElementsBoldResource;
use App\Http\Resources\CenteredTextAndPictureBlockResource;
use App\Http\Resources\FooterBlockResource;
use App\Http\Resources\InitialBlockResource;
use App\Http\Resources\NavigationBlockResource;
use App\Http\Resources\ReviewsBlockResource;
use App\Http\Resources\TimelineBlockResource;
use App\Http\Resources\TrustedOrganizationsBlockResource;
use App\Http\Resources\WelcomingBlockResource;
use App\Repositories\BlockRepository;
use App\Repositories\BlockTypeRepository;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use App\Models\Block;
use Inertia\Inertia;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

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

    public function getBlockData(Block $block)
    {
        $blockType = $block->getTypeAttribute();

        switch ($blockType) {
            case self::BLOCK_WITH_COLUMNS_AND_PICTURES:
                $blockData = new BlockWithColumnElementsAndPicturesResource($block);
                break;
            case self::BLOCK_WITH_DROPDOWNS_AND_PICTURES:
                $blockData = new BlockWithDropdownElementsAndPictureResource($block);
                break;
            case self::BLOCK_WITH_HEADING_AND_BUTTONS:
                $blockData = new BlockWithHeadingAndButtonsResource($block);
                break;
            case self::BLOCK_WITH_HEADING_AND_CAROUSELS:
                $blockData = new BlockWithHeadingAndCarouselResource($block);
                break;
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BASIC:
                $blockData = new BlockWithHeadingAndColumnElementsBasicResource($block);
                break;
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BOLD:
                $blockData = new BlockWithHeadingAndColumnElementsBoldResource($block);
                break;
            case self::BLOCK_WITH_CENTERED_TEXT_AND_PICTURE:
                $blockData = new CenteredTextAndPictureBlockResource($block);
                break;
            case self::FOOTER_BLOCK:
                $blockData = new FooterBlockResource($block);
                break;
            case self::INITIAL_BLOCK:
                $blockData = new InitialBlockResource($block);
                break;
            case self::NAVIGATION_BLOCK:
                $blockData = new NavigationBlockResource($block);
                break;
            case self::REVIEWS_BLOCK:
                $blockData = new ReviewsBlockResource($block);
                break;
            case self::TIMELINE_BLOCK:
                $blockData = new TimelineBlockResource($block);
                break;
            case self::TRUSTED_ORGANIZATIONS_BLOCK:
                $blockData = new TrustedOrganizationsBlockResource($block);
                break;
            case self::WELCOMING_BLOCK:
                $blockData = new WelcomingBlockResource($block);
                break;
            default:
        }

        return $blockData;
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
                $this->blockElementFactory->saveBlockWithColumnsAndPictures(
                    $block,
                    $request->input('paragraph'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_DROPDOWNS_AND_PICTURES:
                $this->blockElementFactory->saveBlockWithDropdownsAndPictures(
                    $block,
                    $request->input('dropdown'),
                    $request->input('dropdownElements'),
                    $request->input('buttons'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_BUTTONS:
                $this->blockElementFactory->saveBlockWithHeadingAndButtons(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('buttons'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_CAROUSELS:
                $this->blockElementFactory->saveBlockWithHeadingAndCarousels(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('carousels'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BASIC:
                $this->blockElementFactory->saveBlockWithHeadingAndColumnsBasic(
                    $block,
                    $request->input('heading'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BOLD:
                $this->blockElementFactory->saveBlockWithHeadingAndColumnsBold(
                    $block,
                    $request->input('heading'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_CENTERED_TEXT_AND_PICTURE:
                $this->blockElementFactory->saveCenteredTextAndPictureBlock(
                    $block,
                    $request->input('centeredText'),
                );
                break;
            case self::FOOTER_BLOCK:
                $this->blockElementFactory->saveFooterBlock(
                    $block,
                    $request->input('footer'),
                );
                break;
            case self::INITIAL_BLOCK:
                $this->blockElementFactory->saveInitialBlock(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('buttons'),
                );
                break;
            case self::NAVIGATION_BLOCK:
                $this->blockElementFactory->saveNavigationBlock(
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
                $this->blockElementFactory->saveTimelineBlock(
                    $block,
                    $request->input('dropdown'),
                    $request->input('dropdownElements'),
                    $request->input('buttons'),
                );
                break;
            case self::TRUSTED_ORGANIZATIONS_BLOCK:
                $this->blockElementFactory->saveTrustedOrganizationsBlock(
                    $block,
                    $request->input('paragraph'),
                    $request->input('imageLinkElements'),
                );
                break;
            case self::WELCOMING_BLOCK:
                $this->blockElementFactory->saveWelcomingBlock(
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
    public function show()
    {
        $blocks = $this->blockRepository->all();
        $landingView = $this->blockRepository->all()->map((fn (Block $block) => $this->getBlockData($block)))->toArray();

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'landingView' => $landingView,
            'blocks' => $blocks,
            'blockTypes' => $this->blockTypeRepository->all(),
            'companies' => $this->companyRepository->all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $block = $this->blockRepository->findById($id);
        $blockType = $block->getTypeAttribute();
        $blockData = $this->getBlockData($block);

        return Inertia::render('BlockEdit', [
            'block' => $blockData->toArray(),
            'blockType' => $blockType,
            'blockTypes' => $this->blockTypeRepository->all(),
            'companies' => $this->companyRepository->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Block $block)
    {
        //dd($block, $request->input());
        $blockType = $block->getTypeAttribute();
        $message = 'Block updated successfully';

        switch ($blockType) {
            case self::BLOCK_WITH_COLUMNS_AND_PICTURES:
                $this->blockElementFactory->saveBlockWithColumnsAndPictures(
                    $block,
                    $request->input('paragraph'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_DROPDOWNS_AND_PICTURES:
                $this->blockElementFactory->saveBlockWithDropdownsAndPictures(
                    $block,
                    $request->input('dropdown'),
                    $request->input('dropdownElements'),
                    $request->input('buttons'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_BUTTONS:
                $this->blockElementFactory->saveBlockWithHeadingAndButtons(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('buttons'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_CAROUSELS:
                $this->blockElementFactory->saveBlockWithHeadingAndCarousels(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('carousels'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BASIC:
                $this->blockElementFactory->saveBlockWithHeadingAndColumnsBasic(
                    $block,
                    $request->input('heading'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_HEADING_AND_COLUMNS_BOLD:
                $this->blockElementFactory->saveBlockWithHeadingAndColumnsBold(
                    $block,
                    $request->input('heading'),
                    $request->input('columnElements'),
                );
                break;
            case self::BLOCK_WITH_CENTERED_TEXT_AND_PICTURE:
                $this->blockElementFactory->saveCenteredTextAndPictureBlock(
                    $block,
                    $request->input('centeredText'),
                );
                break;
            case self::FOOTER_BLOCK:
                $this->blockElementFactory->saveFooterBlock(
                    $block,
                    $request->input('footer'),
                );
                break;
            case self::INITIAL_BLOCK:
                $this->blockElementFactory->saveInitialBlock(
                    $block,
                    $request->input('headingParagraph'),
                    $request->input('buttons'),
                );
                break;
            case self::NAVIGATION_BLOCK:
                $this->blockElementFactory->saveNavigationBlock(
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
                $this->blockElementFactory->saveTimelineBlock(
                    $block,
                    $request->input('dropdown'),
                    $request->input('dropdownElements'),
                    $request->input('buttons'),
                );
                break;
            case self::TRUSTED_ORGANIZATIONS_BLOCK:
                $this->blockElementFactory->saveTrustedOrganizationsBlock(
                    $block,
                    $request->input('paragraph'),
                    $request->input('imageLinkElements'),
                );
                break;
            case self::WELCOMING_BLOCK:
                $this->blockElementFactory->saveWelcomingBlock(
                    $block,
                    $request->input('heading'),
                );
                break;

            default:
                $message = 'This block type is not supported';
        }

        return Inertia::render('Dashboard', [
            'blocks' => $this->blockRepository->all(),
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $block = $this->blockRepository->findById($id);

        $block->delete();

        return Inertia::render('Dashboard', [
            'blocks' => $this->blockRepository->all(),
            'message' => 'Block deleted successfully',
        ]);
    }
}
