<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Filament\Forms\Components\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        if($search) {
            $query->where('name', 'like', "%$search%");
        }

        if($city) {
            $query->whereHas('city', function (Builder $builder) use ($city) {
                $builder->where('slug', $city);
            });
        }

        if($category) {
            $query->whereHas('category', function (Builder $builder) use ($category) {
                $builder->where('slug', $category);
            });
        }

        return $query->get();
        
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')
            ->orderBy('transactions_count', 'desc')
            ->limit($limit)
            ->get();
        
    }

    public function getBoardingHouseByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function (Builder $builder) use ($slug) {
            $builder->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function (Builder $builder) use ($slug) {
            $builder->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();        
    }
}