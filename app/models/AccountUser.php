<?php

class AccountUser extends Eloquent {

    protected $fillable = ['user_id', 'account_id'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'account_user';

    public function account()
    {
        return $this->belongsTo('Account');
    }

    public static function getAccountUser($user_id, $account_id)
    {
        return self::where('user_id', $user_id)
            ->where('account_id', $account_id)
            ->first();
    }

}
