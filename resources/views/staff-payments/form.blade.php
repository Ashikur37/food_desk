<div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
    <label for="salary" class="control-label">{{ 'Salary' }}</label>
    <input class="form-control" name="salary" type="number" id="salary" value="{{ isset($staffpayment->salary) ? $staffpayment->salary : ''}}" required>
    {!! $errors->first('salary', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('paid') ? 'has-error' : ''}}">
    <label for="paid" class="control-label">{{ 'Paid' }}</label>
    <input class="form-control" name="paid" type="number" id="paid" value="{{ isset($staffpayment->paid) ? $staffpayment->paid : ''}}" >
    {!! $errors->first('paid', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('due') ? 'has-error' : ''}}">
    <label for="due" class="control-label">{{ 'Due' }}</label>
    <input class="form-control" name="due" type="number" id="due" value="{{ isset($staffpayment->due) ? $staffpayment->due : ''}}" >
    {!! $errors->first('due', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('month') ? 'has-error' : ''}}">
    <label for="month" class="control-label">{{ 'Month' }}</label>
    <input class="form-control" name="month" type="text" id="month" value="{{ isset($staffpayment->month) ? $staffpayment->month : ''}}" >
    {!! $errors->first('month', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
    <label for="year" class="control-label">{{ 'Year' }}</label>
    <input class="form-control" name="year" type="text" id="year" value="{{ isset($staffpayment->year) ? $staffpayment->year : ''}}" >
    {!! $errors->first('year', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="control-label">{{ 'Details' }}</label>
    <textarea class="form-control" rows="5" name="details" type="textarea" id="details" >{{ isset($staffpayment->details) ? $staffpayment->details : ''}}</textarea>
    {!! $errors->first('details', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('staff_id') ? 'has-error' : ''}}">
    <label for="staff_id" class="control-label">{{ 'Staff Id' }}</label>
    <input class="form-control" name="staff_id" type="number" id="staff_id" value="{{ isset($staffpayment->staff_id) ? $staffpayment->staff_id : ''}}" >
    {!! $errors->first('staff_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
