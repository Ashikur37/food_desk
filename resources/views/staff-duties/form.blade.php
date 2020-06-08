<div class="form-group {{ $errors->has('start_time') ? 'has-error' : ''}}">
    <label for="start_time" class="control-label">{{ 'Start Time' }}</label>
    <input class="form-control" name="start_time" type="time" id="start_time" value="{{ isset($staffduty->start_time) ? $staffduty->start_time : ''}}" >
    {!! $errors->first('start_time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_time') ? 'has-error' : ''}}">
    <label for="end_time" class="control-label">{{ 'End Time' }}</label>
    <input class="form-control" name="end_time" type="time" id="end_time" value="{{ isset($staffduty->end_time) ? $staffduty->end_time : ''}}" >
    {!! $errors->first('end_time', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('day') ? 'has-error' : ''}}">
    <label for="day" class="control-label">{{ 'Day' }}</label>
    <select name="day" class="form-control" id="day" >
    @foreach (json_decode('{"Everyday":"Everyday","Saturday":"Saturday","Sunday":"Sunday","Monday":"Monday","Tuesday":"Saturday","Wednesday":"Wednesday","Thursday":"Thursday","Friday":"Friday"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($staffduty->day) && $staffduty->day == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('day', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff Id' }}</label>
    <input class="form-control" name="staff_id" type="number" id="staff_id" value="{{ isset($staffduty->staff_id) ? $staffduty->staff_id : ''}}" >
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
