<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'Comment' }}</label>
    <textarea class="form-control" rows="5" name="comment" type="textarea" id="comment" required>{{ isset($customerorder->comment) ? $customerorder->comment : ''}}</textarea>
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'Total' }}</label>
    <input class="form-control" name="total" type="number" id="total" value="{{ isset($customerorder->total) ? $customerorder->total : ''}}" >
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount' }}</label>
    <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($customerorder->discount) ? $customerorder->discount : ''}}" >
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('paid') ? 'has-error' : ''}}">
    <label for="paid" class="control-label">{{ 'Paid' }}</label>
    <input class="form-control" name="paid" type="number" id="paid" value="{{ isset($customerorder->paid) ? $customerorder->paid : ''}}" >
    {!! $errors->first('paid', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('due') ? 'has-error' : ''}}">
    <label for="due" class="control-label">{{ 'Due' }}</label>
    <input class="form-control" name="due" type="number" id="due" value="{{ isset($customerorder->due) ? $customerorder->due : ''}}" >
    {!! $errors->first('due', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($customerorder->image) ? $customerorder->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('customer_id') ? 'has-error' : ''}}">
    <label for="customer_id" class="control-label">{{ 'Customer Id' }}</label>
    <input class="form-control" name="customer_id" type="number" id="customer_id" value="{{ isset($customerorder->customer_id) ? $customerorder->customer_id : ''}}" >
    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
