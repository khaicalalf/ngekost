<?php

namespace App\interfaces;

interface TransactionRepositoryInterface
{
   public function getTransactionDataFromSession();

   public function saveTransactionDataToSession($data);

    
}