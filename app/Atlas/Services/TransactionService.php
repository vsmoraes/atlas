<?php namespace Atlas\Services;

use Atlas\Validation\Forms\Transactions as TransactionForm;
use Transaction;
use DB;

class TransactionService {

    protected $transaction;
    protected $transactionForm;

    public function __construct(Transaction $transaction, TransactionForm $transactionForm)
    {
        $this->transaction = $transaction;
        $this->transactionForm = $transactionForm;
    }

    public function getAll($user_id, $account_id = null)
    {
        if ( $account_id ) {
            $data = $this->transaction->getAllFromUserAccount($user_id, $account_id);
        } else {
            $data = $this->transaction->getAllFromUser($user_id);
        }

        return $data;
    }

    public function add($user_id, $data)
    {
        $this->transactionForm->validate($data);
        extract($data);

        return $this->transaction->add($user_id, $account_id, $description, $amount, DB::raw('now()')); // @FIX due date
    }

}