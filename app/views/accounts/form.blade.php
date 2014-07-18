<div class="form-group">
    <label for="id" class="col-md-3 control-label">#</label>
    <div class="col-md-9">
        <span class="form-control">{{ ( isset($account) ? $account->id : '' ) }}</span>
                {{ $errors->first('email', '<span class="help-block">:message</span>') }}
    </div>
</div>

<div class="form-group {{ ( $errors->has('name') ? 'has-error' : '' ) }}">
    <label for="name" class="col-md-3 control-label">Name</label>
    <div class="col-md-9">
        {{ Form::email('name', (isset($account) ? $account->name : null), ['class' => 'form-control', 'placeholder' => 'Name', 'required' => 'required']) }}
        {{ $errors->first('name', '<span class="help-block">:message</span>') }}
    </div>
</div>

<div class="form-group {{ ( $errors->has('amount') ? 'has-error' : '' ) }}">
    <label for="name" class="col-md-3 control-label">Amount</label>
    <div class="col-md-9">
        {{ Form::email('amount', isset($account) ? $account->amount : null, ['class' => 'form-control', 'placeholder' => 'Amount', 'required' => 'required']) }}
        {{ $errors->first('amount', '<span class="help-block">:message</span>') }}
    </div>
</div>