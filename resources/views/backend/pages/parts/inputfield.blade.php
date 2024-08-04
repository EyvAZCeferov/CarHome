<div class="col-sm-6 col-md-4 col-lg-3">
    <label>{{ $label }}@if($required==true) <span class="text-danger">*</span> @endif</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control" value="{{$data}}" @if($required==true) required @endif />
</div>
