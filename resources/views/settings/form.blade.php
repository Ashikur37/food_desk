<div class="form-group {{ $errors->has('site_name') ? 'has-error' : ''}}">
    <label for="site_name" class="control-label">{{ 'Site Name' }}</label>
    <input class="form-control" name="site_name" type="text" id="site_name" value="{{ isset($setting->site_name) ? $setting->site_name : ''}}" >
    {!! $errors->first('site_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sidebar') ? 'has-error' : ''}}">
    <label for="sidebar" class="control-label">{{ 'Sidebar' }}</label>
            <select class="form-control">
                <option {{$setting->sidebar=="left"?"selected":""}} value="left">Left</option>
                <option {{$setting->sidebar=="right"?"selected":""}} value="right">Right</option>
            </select>
    {!! $errors->first('sidebar', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('view') ? 'has-error' : ''}}">
    <label for="view" class="control-label">{{ 'Default View' }}</label>
            <select class="form-control">
                <option {{$setting->view=="grid"?"selected":""}} value="grid">grid</option>
                <option {{$setting->view=="list"?"selected":""}} value="list">List</option>
            </select>
    {!! $errors->first('view', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Logo' }}</label>
    <input type="file" class="" name="logo_img">
    <img style="max-width:200px"  src="{{URL::to('/')}}/images/{{$setting->logo}}">
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('company_id') ? 'has-error' : ''}}">
    <label for="company_id" class="control-label">{{ 'Company ID' }}</label>
    <input type="text" name="company_id" value="{{ isset($setting->company_id) ? $setting->company_id : ''}}" class="form-control">
    {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('api_key') ? 'has-error' : ''}}">
    <label for="api_key" class="control-label">{{ 'Api Key' }}</label>
    <input type="text" name="api_key" value="{{ isset($setting->api_key) ? $setting->api_key : ''}}" class="form-control">
    {!! $errors->first('api_key', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('from_email') ? 'has-error' : ''}}">
    <label for="from_email" class="control-label">{{ 'From Email' }}</label>
    <input type="text" name="from_email" value="{{ isset($setting->from_email) ? $setting->from_email : ''}}" class="form-control">
    {!! $errors->first('from_email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pagination_length') ? 'has-error' : ''}}">
    <label for="pagination_length" class="control-label">{{ 'Pagination Length' }}</label>
    <input type="number" name="pagination_length" value="{{ isset($setting->pagination_length) ? $setting->pagination_length : 5}}" class="form-control">
    {!! $errors->first('pagination_length', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fav_icon') ? 'has-error' : ''}}">
    <label for="fav_icon" class="control-label">{{ 'Fav Icon' }}</label>
    <input type="file" class="" name="fav_icon_img">
    <img style="max-width:200px"  src="{{URL::to('/')}}/images/{{$setting->fav_icon}}">
    {!! $errors->first('fav_icon', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('banner') ? 'has-error' : ''}}">
    <label for="banner" class="control-label">{{ 'Banner' }}</label>
    <input type="file" class="" name="banner_img">
    <img style="max-width:200px"   src="{{URL::to('/')}}/images/{{$setting->banner}}">

    {!! $errors->first('banner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sticky_logo') ? 'has-error' : ''}}">
    <label for="sticky_logo" class="control-label">{{ 'Sticky Logo' }}</label>
    <input type="file" class="" name="sticky_logo_img">
    <img style="max-width:200px"  src="{{URL::to('/')}}/images/{{$setting->sticky_logo}}">

    {!! $errors->first('sticky_logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('default_product') ? 'has-error' : ''}}">
    <label for="default_product" class="control-label">{{ 'Default Product Image' }}</label>
    <input type="file" class="" name="default_product_img">
    <img style="max-width:200px"  src="{{URL::to('/')}}/images/{{$setting->default_product}}">

    {!! $errors->first('default_product', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('them_color') ? 'has-error' : ''}}">
    <label for="them_color" class="control-label">{{ 'Theme Color' }}</label>
    <input type="color" class="form-control" name="them_color" value="{{ isset($setting->them_color) ? $setting->them_color : ''}}">

    {!! $errors->first('them_color', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
