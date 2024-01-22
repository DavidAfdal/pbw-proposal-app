@foreach ($items as $data)
<div class="checkbox-container">
    <label class="checkbox-label d-flex gap-2" for="myCheckbox" style="flex:1;"> <i class="ri-user-line"></i>{{$data->nama}}</label>
    <p style="font-size:14px; flex:1;" class="fw-bold">({{$data->nidn}})</p>
    <input type="radio" id="myCheckbox" name="peninjau" class="exclusive-checkbox" value="{{$data->nidn}}">
</div>
@endforeach

