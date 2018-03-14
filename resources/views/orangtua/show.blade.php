@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Orang Tua Murid Pencak Silat 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Orang Tua Murid</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $orangtua->nama }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama Murid Silat</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $orangtua->Murid->nama }}"  readonly>
			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection