@extends('layouts.app')
@section('content')

<div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="guru">Guru Pelatih Silat</a></li>
              <li><a  href=orangtua>Orang Tua Murid Silat</a></li>
              </ul>

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Data Murid Silat
			  	<div class="panel-title pull-right"><a href="{{ route('murid.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Nama Murid Pencak Silat</th>
					  <th>Nomor Induk Keanggotaan Silat</th>
					  <th>Guru Pelatih Silat</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($mrd as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->nama }}</td>
				    	<td><p>{{ $data->nik }}</p></td>
				    	<td><p>{{ $data->Guru->nama }}</p></td>
						<td>
							<a class="btn btn-warning" href="{{ route('murid.edit',$data->id) }}">Edit</a>
						</td>
						<td>
							<a href="{{ route('murid.show',$data->id) }}" class="btn btn-success">Show</a>
						</td>
						<td>
							<form method="post" action="{{ route('murid.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger">Hapus</button>
							</form>
						</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection