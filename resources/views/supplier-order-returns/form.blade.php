<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'Comment' }}</label>
    <textarea class="form-control" rows="5" name="comment" type="textarea" id="comment" required>{{ isset($supplierorderreturn->comment) ? $supplierorderreturn->comment : ''}}</textarea>
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'Total' }}</label>
    <input class="form-control" name="total" type="number" id="total" value="{{ isset($supplierorderreturn->total) ? $supplierorderreturn->total : ''}}" >
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount' }}</label>
    <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($supplierorderreturn->discount) ? $supplierorderreturn->discount : ''}}" >
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('paid') ? 'has-error' : ''}}">
    <label for="paid" class="control-label">{{ 'Paid' }}</label>
    <input class="form-control" name="paid" type="number" id="paid" value="{{ isset($supplierorderreturn->paid) ? $supplierorderreturn->paid : ''}}" >
    {!! $errors->first('paid', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('due') ? 'has-error' : ''}}">
    <label for="due" class="control-label">{{ 'Due' }}</label>
    <input class="form-control" name="due" type="number" id="due" value="{{ isset($supplierorderreturn->due) ? $supplierorderreturn->due : ''}}" >
    {!! $errors->first('due', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('supplier_order_id') ? 'has-error' : ''}}">
    <label for="supplier_order_id" class="control-label">{{ 'Supplier Order Id' }}</label>
    <input class="form-control" name="supplier_order_id" type="number" id="supplier_order_id" value="{{ isset($supplierorderreturn->supplier_order_id) ? $supplierorderreturn->supplier_order_id : ''}}" >
    {!! $errors->first('supplier_order_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
