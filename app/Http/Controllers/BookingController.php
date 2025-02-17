<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerInformationStoreRequest;
use App\Interfaces\BoardingHouseRepositoryInterface;
use App\interfaces\TransactionRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Transaction;
use App\Repositories\BoardingHouseRepository;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    private TransactionRepositoryInterface $transactionRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function booking(Request $request, $slug){
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        return redirect()->route('booking.information', $slug);
    }

    public function information($slug)
    {
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room']);
        //dd($transaction);
        return view('pages.booking.information', compact('boardingHouse', 'transaction', 'room'));
    }
    
    public function saveInformation(CustomerInformationStoreRequest $request, $slug){
        $data = $request->validated();

        $this->transactionRepository->saveTransactionDataToSession($data);

        dd($this->transactionRepository->getTransactionDataFromSession());

    }

    public function check()
    {
        return view('pages.check-booking');
    }
}
