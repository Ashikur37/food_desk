<div class="form-group {{ $errors->has('buying_price') ? 'has-error' : ''}}">
    <label for="buying_price" class="control-label">{{ 'Buying Price' }}</label>
    <input class="form-control" name="buying_price" type="number" id="buying_price" value="{{ isset($medicine->buying_price) ? $medicine->buying_price : ''}}" >
    {!! $errors->first('buying_price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('selling_price') ? 'has-error' : ''}}">
    <label for="selling_price" class="control-label">{{ 'Selling Price' }}</label>
    <input class="form-control" name="selling_price" type="number" id="selling_price" value="{{ isset($medicine->selling_price) ? $medicine->selling_price : ''}}" >
    {!! $errors->first('selling_price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($medicine->quantity) ? $medicine->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="control-label">{{ 'Details' }}</label>
    <textarea class="form-control" rows="5" name="details" type="textarea" id="details" >{{ isset($medicine->details) ? $medicine->details : ''}}</textarea>
    {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($medicine->image) ? $medicine->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('groupname_id') ? 'has-error' : ''}}">
    <label for="groupname_id" class="control-label">{{ 'Groupname Id' }}</label>
    <input class="form-control" name="groupname_id" type="number" id="groupname_id" value="{{ isset($medicine->groupname_id) ? $medicine->groupname_id : ''}}" >
    {!! $errors->first('groupname_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('manufacturer_id') ? 'has-error' : ''}}">
    <label for="manufacturer_id" class="control-label">{{ 'Manufacturer Id' }}</label>
    <input class="form-control" name="manufacturer_id" type="number" id="manufacturer_id" value="{{ isset($medicine->manufacturer_id) ? $medicine->manufacturer_id : ''}}" >
    {!! $errors->first('manufacturer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('shelf_id') ? 'has-error' : ''}}">
    <label for="shelf_id" class="control-label">{{ 'Shelf Id' }}</label>
    <input class="form-control" name="shelf_id" type="number" id="shelf_id" value="{{ isset($medicine->shelf_id) ? $medicine->shelf_id : ''}}" >
    {!! $errors->first('shelf_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_type_id') ? 'has-error' : ''}}">
    <label for="medicine_type_id" class="control-label">{{ 'Medicine Type Id' }}</label>
    <input class="form-control" name="medicine_type_id" type="number" id="medicine_type_id" value="{{ isset($medicine->medicine_type_id) ? $medicine->medicine_type_id : ''}}" >
    {!! $errors->first('medicine_type_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
