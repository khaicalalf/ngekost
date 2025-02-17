<?php

namespace App\interfaces;

interface TransactionRepositoryInterface
{
   public function getTrasactionDataFromSession();

   public function saveTransactionDataToSession($data);

    
}