<?php

namespace App\Http\Controllers;

use App\Factories\BlockElementFactory;
use App\Http\Requests\BlockRequest;
use App\Repositories\BlockRepository;
use App\Repositories\BlockTypeRepository;
use Illuminate\Http\Request;
use App\Models\Block;
use Inertia\Inertia;

class BlockController extends Controller
{
    private const BLOCK_WITH_COLUMNS_AND_PICTURES = 'Block with column elements and pictures';
    private const FOOTER_BLOCK = 'Footer block';

    public function __construct(
        private BlockTypeRepository $blockTypeRepository,
        private BlockRepository $blockRepository,
        private BlockElementFactory $blockElementFactory,
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
            case self::FOOTER_BLOCK:

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
