@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Murid Pencak Silat 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Title</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $mrd->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Content</label>
						<input type="text" name="title" class="form-control" value="{{ $mrd->nik }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Guru Pelatih Silat</label>
						<input type="text" name="title" class="form-control" value="{{ $mrd->Guru->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection