@extends('admin.layouts.gen')
@section('title', 'Logs Activity')



@section('content')



<!-- Page content -->
<div id="page-content-wrapper">
	<div class="page-content">
		<div class="container-fluid">

			<div class="row">

				<div class="col-md-12">
					<div class="panel panel-default">
					<div class="panel-heading">
						<h2> Logs Activity </h2>
						@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
						@endif
					</div>
					@if ($logs->isEmpty())
						<p> There is no Log.</p>
					@else

						<div class="panel-body">

							<div class="list-group">
							@foreach($logs as $log)
								<div class="list-group-item">
									<div class="media">
										<div class="media-left">
											<img class="img-circle" src="{{ URL::asset('images/users/'.$log->user_id.'.jpg') }}" style="width:50px;height:50px"/>
										</div>
										<div class="media-body">
										<p>{!! $log->text !!}</p>
										</div>
									</div>
								</div>
							@endforeach
							</div>
							@endif
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection







	

