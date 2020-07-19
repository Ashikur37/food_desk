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

<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input type="text" class="form-control" name="phone" value="{{ isset($setting->phone) ? $setting->phone : ''}}">

    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <textarea class="form-control"  name="address">{{$setting->address}}</textarea>

    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('css') ? 'has-error' : ''}}">
    <label for="css" class="control-label">{{ 'CSS' }}</label>
    <textarea class="form-control"  name="css">{{$setting->css}}</textarea>

    {!! $errors->first('css', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('homepage_notice') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Homepage Notice' }}</label>
    <textarea class="text-area homepage_notice form-control"  name="homepage_notice"></textarea>

    {!! $errors->first('homepage_notice', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('them_color') ? 'has-error' : ''}}">
    <label for="them_color" class="control-label">{{ 'Show Notice' }}</label>
    <select class="form-control" name="show_notice">
        <option value="1" {{$setting->show_notice=="1"?"selected":""}}>Show</option>
        <option value="0" {{$setting->show_notice=="0"?"selected":""}}>Hide</option>

    </select>
</div>

<div class="form-group {{ $errors->has('hide_rate') ? 'has-error' : ''}}">
    <label for="them_color" class="control-label">{{ 'Hide Rate' }}</label>
    <select class="form-control" name="hide_rate">
        <option value="1" {{$setting->hide_rate=="1"?"selected":""}}>Show</option>
        <option value="0" {{$setting->hide_rate=="0"?"selected":""}}>Hide</option>

    </select>
</div>

<div class="form-group {{ $errors->has('hide_rate_guest') ? 'has-error' : ''}}">
    <label for="them_color" class="control-label">{{ 'Hide Rate Guest' }}</label>
    <select class="form-control" name="hide_rate_guest">
        <option value="1" {{$setting->hide_rate_guest=="1"?"selected":""}}>Show</option>
        <option value="0" {{$setting->hide_rate_guest=="0"?"selected":""}}>Hide</option>

    </select>
</div>

<div class="form-group {{ $errors->has('offline') ? 'has-error' : ''}}">
    <label for="offline" class="control-label">{{ 'Put Offline' }}</label>
    <select class="form-control" name="offline">
        <option value="1" {{$setting->offline=="1"?"selected":""}}>Yes</option>
        <option value="0" {{$setting->offline=="0"?"selected":""}}>No</option>

    </select>
</div>

<div class="form-group {{ $errors->has('offline_message') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Offline Message' }}</label>
    <textarea class="offline_message textarea form-control"  name="offline_message"></textarea>

    {!! $errors->first('offline_message', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('ok_mail_subject') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'OK Mail Subject' }}</label>
    <input type="text" class="form-control" name="ok_mail_subject" value="{{$setting->ok_mail_subject}}">
    {!! $errors->first('ok_mail_subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ok_mail') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'OK Mail Body' }}</label>
    <textarea class="ok_mail textarea form-control"  name="ok_mail"></textarea>

    {!! $errors->first('ok_mail', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group {{ $errors->has('success_mail_subject') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Success Mail Subject' }}</label>
    <input type="text" class="form-control" name="success_mail_subject" value="{{$setting->success_mail_subject}}">
    {!! $errors->first('success_mail_subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('success_mail') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Success Mail Body' }}</label>
    <textarea class="textarea form-control success_mail"  name="success_mail"></textarea>

    {!! $errors->first('success_mail', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('hold_mail_subject') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Hold Mail Subject' }}</label>
    <input type="text" class="form-control" name="hold_mail_subject" value="{{$setting->hold_mail_subject}}">
    {!! $errors->first('hold_mail_subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('hold_mail') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Hold Mail Body' }}</label>
    <textarea class="textarea form-control hold_mail"  name="hold_mail"></textarea>

    {!! $errors->first('hold_mail', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('delivery_complete_subject') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Delivery Complete Subject' }}</label>
    <input type="text" class="form-control" name="delivery_complete_subject" value="{{$setting->delivery_complete_subject}}">
    {!! $errors->first('delivery_complete_subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('delivery_complete') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Delivery Complete Body' }}</label>
    <textarea class="textarea form-control delivery_complete"  name="delivery_complete"></textarea>

    {!! $errors->first('delivery_complete', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('collection_complete_subject') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Collection Complete Subject' }}</label>
    <input type="text" class="form-control" name="collection_complete_subject" value="{{$setting->collection_complete_subject}}">
    {!! $errors->first('collection_complete_subject', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('collection_complete') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Collection Complete Body' }}</label>
    <textarea class="textarea form-control collection_complete"  name="collection_complete"></textarea>

    {!! $errors->first('collection_complete', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
@section('script')

<script>
$(function () {
    // Summernote
     $('.textarea').summernote()
    $('.ok_mail').summernote('code', `{!! $setting->ok_mail !!}`);
    $('.success_mail').summernote('code', `{!! $setting->success_mail !!}`);
    $('.hold_mail').summernote('code', `{!! $setting->hold_mail !!}`);
    $('.delivery_complete').summernote('code', `{!! $setting->delivery_complete !!}`);
    $('.collection_complete').summernote('code', `{!! $setting->collection_complete !!}`);
$('.offline_message').summernote('code', `{!! $setting->offline_message !!}`);
$('.homepage_notice').summernote('code', `{!! $setting->homepage_notice !!}`);
  })
  </script>
@endsection
