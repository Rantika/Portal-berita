@extends('layouts.dafault')

@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-tiatle">Edit Iklan{{$iklan->judul}}</div>
                        <a href="{{route('iklan.index')}}" class="btn btn-warning btn-sn ml-auto">Back</a>
					</div>
				</div>
				<div class="card-body">
                <form method ="post" action="{{route('iklan.update', $iklan->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">Judul Iklan</label>
                        <input type="text" class="form-control" id="text" name="judul" value="{{$iklan->judul}}">
                    </div>
                    <div class="form-group">
                        <label for="Link">Link Iklan</label>
                        <input type="text" class="form-control" id="text" name="link" value="{{$iklan->link}}">
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                       <select  class="form-control"  name="status" >
                        <option value="1"{{$iklan->status == '1' ?'selected':''}}>Publish</option>
                        <option value="0" {{$iklan->status == '0' ?'selected':''}}>Draft</option>
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Iklan</label>
                       <input type="file"  class="form-control"  name="gambar_iklan" >
                       <br>
                       <label for="gambar">Gambar Saat ini</label><br>
                       <img src="{{asset('uploads/'.$iklan->gambar_iklan)}}" width="100">
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary btm-sm" type="submit" >Save</button>
                    <button class="btn btn-danger btm-sm" type="Reset" >Reset</button>
                   </div>
                </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
