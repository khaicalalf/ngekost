<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->getAllCities();
        $popularBoardingHouses = $this->boardingHouseRepository->getPopularBoardingHouses();
        $categories = $this->categoryRepository->getAllCategories();
        $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses();

        return view('pages.home', compact('cities', 'categories', 'boardingHouses', 'popularBoardingHouses'));
    }

}
