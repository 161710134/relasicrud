@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Guru Silat 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Guru Silat</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $n->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nomor Induk Pengajar Silat</label>	
			  			<input type="text" name="nips" class="form-control" value="{{ $n->nips }}"  readonly>
			  		</div>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection