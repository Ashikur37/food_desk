<div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
    <label for="role_id" class="control-label">{{ 'Role Id' }}</label>
    <input class="form-control" name="role_id" type="number" id="role_id" value="{{ isset($abilityrole->role_id) ? $abilityrole->role_id : ''}}" required>
    {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ability_id') ? 'has-error' : ''}}">
    <label for="ability_id" class="control-label">{{ 'Ability Id' }}</label>
    <input class="form-control" name="ability_id" type="number" id="ability_id" value="{{ isset($abilityrole->ability_id) ? $abilityrole->ability_id : ''}}" required>
    {!! $errors->first('ability_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
