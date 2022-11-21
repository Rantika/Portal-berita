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
						<div class="card-title">Data Artikel</div>
                        <a href="{{route('artikel.create')}}" class="btn btn-primary btn-sn ml-auto"><i class="fas fa-plus"></i>Tambah Artikel</a>
					</div>
				</div>
				<div class="card-body">
                    @if(Session::has('succes'))
                        <div class="alert alert-primary">
                            {{Session('succes')}}
                        </div>
                    @endif
					<div class="table-responsive">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Artikel</th>
                                   <th>Slug</th>
                                   <th>Kategori</th>
                                   <th>Author</th>
                                   <th>Gambar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($artikel as $row)
                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->judul}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td>{{$row->kategori->nama_kategori}}</td>
                                    <td>{{$row->users->name}}</td>
                                    <td><img src="{{asset('uploads/'.$row->gambar_artikel)}}" width="100"></td>
                                    <td>
                                        <a href="{{route('artikel.edit', $row->id)}}" class="btn btn-warning btn-sm"> <i class="fas fa-pen"></i></a>
                                    <form action="{{route('artikel.destroy', $row->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-times"></i>
                                    </button>


                                    </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data masih kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
