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
						<div class="card-tiatle">Form Artikel</div>
                        <a href="{{route('artikel.index')}}" class="btn btn-warning btn-sn ml-auto">Back</a>
					</div>
				</div>
				<div class="card-body">
                <form method ="post" action="{{route('artikel.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" class="form-control" id="text" name="judul" placeholder="Judul Artikel">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                       <textarea  class="form-control"  name="body" id="editor1"  ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                       <select  class="form-control"  name="kategori_id" >
                        @foreach ($kategori as $row )
                        <option value="{{$row->id}}">{{$row->nama_kategori}}</option>
                        @endforeach
                       </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Artikel</label>
                       <input type="file"  class="form-control"  name="gambar_artikel" >
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                       <select  class="form-control"  name="is_active" >
                        <option value="1">Publish</option>
                        <option value="0">Draft</option>
                       </select>
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
