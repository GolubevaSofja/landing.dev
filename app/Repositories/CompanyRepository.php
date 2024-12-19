<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;

class CompanyRepository
{
    public function create(string $name, string $logo) : Company
    {
        return Company::create([
            'name' => $name,
            'logo' => $logo,
        ]);
    }

    public function all(): Collection
    {
        return Company::all();
    }
}
