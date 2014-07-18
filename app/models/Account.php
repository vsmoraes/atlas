<?php

class Account extends Eloquent {

	protected $fillable = ['name', 'amount'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'accounts';

    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function getAllFromUser($user_id)
    {
        return $this->with('users')
            ->whereHas('users', function($query) use ($user_id) {
                $query->where('users.id', $user_id);
            })
            ->orderBy('name')
            ->get();
    }

    public function createUserAccount($user_id, $data)
    {
        $account = $this->create($data);
        AccountUser::create(['user_id' => $user_id, 'account_id' => $account->id]);

        return $account;
    }

}
