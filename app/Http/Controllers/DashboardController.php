<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BlockTypeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\BackgroundController;
use App\Http\Controllers\ButtonController;
use App\Http\Controllers\ColumnElementController;
use App\Http\Controllers\HeadBlockController;
use App\Http\Controllers\HeadBlockElementController;
use App\Http\Controllers\HeadingParagraphBlockController;
use App\Http\Controllers\HeadingBlockController;
use App\Http\Controllers\ParagraphBlockController;
use App\Http\Controllers\ImageLinkController;
use App\Http\Controllers\CenteredPictureBlockController;
use App\Http\Controllers\DropdownBlockController;
use App\Http\Controllers\DropdownBlockElementController;
use App\Http\Controllers\ReviewBlockController;
use App\Http\Controllers\FooterBlockController;
use App\Http\Controllers\CarouselController;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Вызываем методы из контроллеров
        $blockTypeTable = app(BlockTypeController::class)->getTableName();
        $companyTable = app(CompanyController::class)->getTableName();
        $blockTable = app(BlockController::class)->getTableName();
        $backgroundTable = app(BackgroundController::class)->getTableName();
        $buttonTable = app(ButtonController::class)->getTableName();
        $columnElementTable = app(ColumnElementController::class)->getTableName();
        $headBlockTable = app(HeadBlockController::class)->getTableName();
        $headBlockElementTable = app(HeadBlockElementController::class)->getTableName();
        $headingBlockTable = app(HeadingBlockController::class)->getTableName();
        $headingParagraphBlockTable = app(HeadingParagraphBlockController::class)->getTableName();
        $paragraphBlockTable = app(ParagraphBlockController::class)->getTableName();
        $imageLinkTable = app(ImageLinkController::class)->getTableName();
        $centeredPictureBlockTable = app(CenteredPictureBlockController::class)->getTableName();
        $dropdownBlockTable = app(DropdownBlockController::class)->getTableName();
        $dropdownBlockElementTable = app(DropdownBlockElementController::class)->getTableName();
        $reviewBlockTable = app(ReviewBlockController::class)->getTableName();
        $footerBlockTable = app(FooterBlockController::class)->getTableName();
        $carouselTable = app(CarouselController::class)->getTableName();

        // Собираем названия таблиц в массив
        $tables = [
            'blockTypeTable' => $blockTypeTable,
            'companyTable' => $companyTable,
            'blockTable' => $blockTable,
            'backgroundTable' => $backgroundTable,
            'buttonTable' => $buttonTable,
            'columnElementTable' => $columnElementTable,
            'headBlockTable' => $headBlockTable,
            'headBlockElementTable' => $headBlockElementTable,
            'headingBlockTable' => $headingBlockTable,
            'headingParagraphBlockTable' => $headingParagraphBlockTable,
            'paragraphBlockTable' => $paragraphBlockTable,
            'imageLinkTable' => $imageLinkTable,
            'centeredPictureBlockTable' => $centeredPictureBlockTable,
            'dropdownBlockTable' => $dropdownBlockTable,
            'dropdownBlockElementTable' => $dropdownBlockElementTable,
            'reviewBlockTable' => $reviewBlockTable,
            'footerBlockTable' => $footerBlockTable,
            'carouselTable' => $carouselTable,
        ];

        return Inertia::render('HomePage', ['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
