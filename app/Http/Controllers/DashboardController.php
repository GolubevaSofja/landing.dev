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
        $blockTypes = app(BlockTypeController::class)->index();

        return Inertia::render('HomePage', [
            'blockTypes' => $blockTypes,
        ]);
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
