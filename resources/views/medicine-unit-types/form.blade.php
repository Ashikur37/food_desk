<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($medicineunittype->quantity) ? $medicineunittype->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('buying_Price') ? 'has-error' : ''}}">
    <label for="buying_Price" class="control-label">{{ 'Buying Price' }}</label>
    <input class="form-control" name="buying_Price" type="number" id="buying_Price" value="{{ isset($medicineunittype->buying_Price) ? $medicineunittype->buying_Price : ''}}" >
    {!! $errors->first('buying_Price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('selling_price') ? 'has-error' : ''}}">
    <label for="selling_price" class="control-label">{{ 'Selling Price' }}</label>
    <input class="form-control" name="selling_price" type="number" id="selling_price" value="{{ isset($medicineunittype->selling_price) ? $medicineunittype->selling_price : ''}}" >
    {!! $errors->first('selling_price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_id') ? 'has-error' : ''}}">
    <label for="medicine_id" class="control-label">{{ 'Medicine Id' }}</label>
    <input class="form-control" name="medicine_id" type="number" id="medicine_id" value="{{ isset($medicineunittype->medicine_id) ? $medicineunittype->medicine_id : ''}}" >
    {!! $errors->first('medicine_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('unit_type_id') ? 'has-error' : ''}}">
    <label for="unit_type_id" class="control-label">{{ 'Unit Type Id' }}</label>
    <input class="form-control" name="unit_type_id" type="number" id="unit_type_id" value="{{ isset($medicineunittype->unit_type_id) ? $medicineunittype->unit_type_id : ''}}" >
    {!! $errors->first('unit_type_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
