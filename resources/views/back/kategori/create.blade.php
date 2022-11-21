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
						<div class="card-tiatle">Form Kategori</div>
                        <a href="{{route('kategori.index')}}" class="btn btn-warning btn-sn ml-auto">Back</a>
					</div>
				</div>
				<div class="card-body">
                <form method ="post" action="{{route('kategori.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="text" name="nama_kategori" placeholder="Enter Kategori">
                    </div>
                    <div class="form-group">
                    <button class="btn btn-primary btm-sm" type="submit" >Save</button>
                   </div>
                </form>


				</div>
			</div>
		</div>
	</div>
</div>
@endsection
