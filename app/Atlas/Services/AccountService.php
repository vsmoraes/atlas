<?php namespace Atlas\Services;

use Atlas\Validation\Forms\Accounts as AccountForm;
use DB;
use Account;
use Transaction;

class AccountService {

    protected $account;
    protected $accountForm;
    protected $transaction;

    public function __construct(Account $account, AccountForm $accountForm, Transaction $transaction)
    {
        $this->account = $account;
        $this->accountForm = $accountForm;
        $this->transaction = $transaction;
    }

    public function get($id)
    {
        return $this->account->findOrFail($id);
    }

    public function getAll($user_id)
    {
        return $this->account->getAllFromUser($user_id);
    }

    public function addNew($user_id, array $data)
    {
        $this->accountForm->validate($data);

        $amount = $data['amount'];
        unset($data['amount']);

        $account = $this->account->createUserAccount($user_id, $data);
        $transaction = $this->transaction->add($user_id, $account->id, 'Account\'s initial amount', $amount, DB::raw('now()')); // @FIX add string to the languages

        return $account;
    }
    
}