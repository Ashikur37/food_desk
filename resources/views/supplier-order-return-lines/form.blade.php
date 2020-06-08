<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($supplierorderreturnline->quantity) ? $supplierorderreturnline->quantity : ''}}" required>
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($supplierorderreturnline->price) ? $supplierorderreturnline->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : ''}}">
    <label for="discount" class="control-label">{{ 'Discount' }}</label>
    <input class="form-control" name="discount" type="number" id="discount" value="{{ isset($supplierorderreturnline->discount) ? $supplierorderreturnline->discount : ''}}" >
    {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('subtotal') ? 'has-error' : ''}}">
    <label for="subtotal" class="control-label">{{ 'Subtotal' }}</label>
    <input class="form-control" name="subtotal" type="number" id="subtotal" value="{{ isset($supplierorderreturnline->subtotal) ? $supplierorderreturnline->subtotal : ''}}" >
    {!! $errors->first('subtotal', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('supplier_order_return_id') ? 'has-error' : ''}}">
    <label for="supplier_order_return_id" class="control-label">{{ 'Supplier Order Return Id' }}</label>
    <input class="form-control" name="supplier_order_return_id" type="number" id="supplier_order_return_id" value="{{ isset($supplierorderreturnline->supplier_order_return_id) ? $supplierorderreturnline->supplier_order_return_id : ''}}" >
    {!! $errors->first('supplier_order_return_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_id') ? 'has-error' : ''}}">
    <label for="medicine_id" class="control-label">{{ 'Medicine Id' }}</label>
    <input class="form-control" name="medicine_id" type="number" id="medicine_id" value="{{ isset($supplierorderreturnline->medicine_id) ? $supplierorderreturnline->medicine_id : ''}}" >
    {!! $errors->first('medicine_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_unit_type_id') ? 'has-error' : ''}}">
    <label for="medicine_unit_type_id" class="control-label">{{ 'Medicine Unit Type Id' }}</label>
    <input class="form-control" name="medicine_unit_type_id" type="number" id="medicine_unit_type_id" value="{{ isset($supplierorderreturnline->medicine_unit_type_id) ? $supplierorderreturnline->medicine_unit_type_id : ''}}" >
    {!! $errors->first('medicine_unit_type_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
