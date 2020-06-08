<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($supplierorderline->quantity) ? $supplierorderline->quantity : ''}}" required>
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($supplierorderline->price) ? $supplierorderline->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount' }}</label>
    <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($supplierorderline->discount) ? $supplierorderline->discount : ''}}" >
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subtotal') ? 'has-error' : ''}}">
    <label for="subtotal" class="control-label">{{ 'Subtotal' }}</label>
    <input class="form-control" name="subtotal" type="number" id="subtotal" value="{{ isset($supplierorderline->subtotal) ? $supplierorderline->subtotal : ''}}" >
    {!! $errors->first('subtotal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('supplier_order_id') ? 'has-error' : ''}}">
    <label for="supplier_order_id" class="control-label">{{ 'Supplier Order Id' }}</label>
    <input class="form-control" name="supplier_order_id" type="number" id="supplier_order_id" value="{{ isset($supplierorderline->supplier_order_id) ? $supplierorderline->supplier_order_id : ''}}" >
    {!! $errors->first('supplier_order_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_id') ? 'has-error' : ''}}">
    <label for="medicine_id" class="control-label">{{ 'Medicine Id' }}</label>
    <input class="form-control" name="medicine_id" type="number" id="medicine_id" value="{{ isset($supplierorderline->medicine_id) ? $supplierorderline->medicine_id : ''}}" >
    {!! $errors->first('medicine_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_unit_type_id') ? 'has-error' : ''}}">
    <label for="medicine_unit_type_id" class="control-label">{{ 'Medicine Unit Type Id' }}</label>
    <input class="form-control" name="medicine_unit_type_id" type="number" id="medicine_unit_type_id" value="{{ isset($supplierorderline->medicine_unit_type_id) ? $supplierorderline->medicine_unit_type_id : ''}}" >
    {!! $errors->first('medicine_unit_type_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
