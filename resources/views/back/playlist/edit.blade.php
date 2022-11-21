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
						<div class="card-tiatle">Playlist Vidio{{$playlist->judul_playlist}}</div>
                        <a href="{{route('playlist.index')}}" class="btn btn-warning btn-sn ml-auto">Back</a>
					</div>
				</div>
				<div class="card-body">
                <form method ="post" action="{{route('playlist.update', $playlist->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="judul">PlayList Vidio</label>
                        <input type="text" class="form-control" id="text" name="judul_playlist" placeholder="Enter Kategori" value="{{$playlist->judul_playlist}}">
                    </div>
                    <div class="form-group">
                        <label for="body">Deskripsi</label>
                       <textarea  class="form-control"  name="deskripsi" id="editor1" >{{$playlist->deskripsi}}</textarea>
                    </div>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                       <select  class="form-control"  name="is_active" >
                        <option value="1"{{$playlist->is_active == '1' ?'selected':''}}>Publish</option>
                        <option value="0" {{$playlist->is_active == '0' ?'selected':''}}>Draft</option>
                       </select>
                    </div>

                    <div class="form-group">
                        <label for="gambar">Gambar Playlist</label>
                       <input type="file"  class="form-control"  name="gambar_playlist" >
                       <br>
                       <label for="gambar">Gambar Saat ini</label><br>
                       <img src="{{asset('uploads/'.$playlist->gambar_playlist)}}" width="100">
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
