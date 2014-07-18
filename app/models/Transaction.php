<?php

class Transaction extends Eloquent {

	protected $fillable = ['account_user_id', 'description', 'amount', 'due_date', 'previous_amount'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'transactions';

    public function account_user()
    {
        return $this->belongsTo('AccountUser');
    }

    public function add($user_id, $account_id, $description, $amount, $due_date)
    {
        // find account_user relation
        $account_user_id = AccountUser::getAccountUser($user_id, $account_id)->id;

        // get account current amount
        $account = Account::find($account_id);
        $previous_amount = $account->amount;

        $data = compact('account_user_id', 'description', 'amount', 'due_date', 'previous_amount');
        $transaction = $this->create($data);

        //if ( strtotime($due_date) >= strtotime(date('Y-m-d H:i:s')) ) {
            $account->amount = $previous_amount + $amount;
            $account->save();
        //}

        return $transaction;
    }

    public function getAllFromUserAccount($user_id, $account_id)
    {
        return $this->with(['account_user.account'])
            ->whereHas('account_user', function($query) use ($user_id, $account_id) {
                $query->where('account_user.user_id', $user_id);
                $query->where('account_user.account_id', $account_id);
            })
            ->orderBy('due_date', 'DESC')
            ->get();
    }

    public function getAllFromUser($user_id)
    {
        return $this->with(['account_user.account'])
            ->whereHas('account_user', function($query) use ($user_id) {
                $query->where('account_user.user_id', $user_id);
            })
            ->orderBy('due_date', 'DESC')
            ->get();
    }

}
