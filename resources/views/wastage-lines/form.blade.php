<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($wastageline->quantity) ? $wastageline->quantity : ''}}" required>
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_id') ? 'has-error' : ''}}">
    <label for="medicine_id" class="control-label">{{ 'Medicine Id' }}</label>
    <input class="form-control" name="medicine_id" type="number" id="medicine_id" value="{{ isset($wastageline->medicine_id) ? $wastageline->medicine_id : ''}}" >
    {!! $errors->first('medicine_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('medicine_unit_type_id') ? 'has-error' : ''}}">
    <label for="medicine_unit_type_id" class="control-label">{{ 'Medicine Unit Type Id' }}</label>
    <input class="form-control" name="medicine_unit_type_id" type="number" id="medicine_unit_type_id" value="{{ isset($wastageline->medicine_unit_type_id) ? $wastageline->medicine_unit_type_id : ''}}" >
    {!! $errors->first('medicine_unit_type_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
