@extends('admin.layouts.gen')
@section('title', 'The Departments')

@section('links')<meta name="csrf-token" content="{{ csrf_token() }}">@endsection



@section('content')




<!-- Page content -->
<div id="page-content-wrapper">
	<div class="page-content">
		<div class="container-fluid">

			<div class="row">

			    <div class="col-md-12">


			    <div class="col-lg-12 margin-tb">					
			        <div class="pull-left">
			            <h2>Department Section</h2>
			        </div>
			        <div class="pull-right">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
						  <span class="glyphicon glyphicon-plus"></span>
					</button>
			        </div>
			    </div>
			</div>

			<table class="table table-bordered">
				<thead>
				    <tr>
					<th>Name</th>
					<th>Description</th>
					<th width="200px">Action</th>
				    </tr>
				</thead>
				<tbody>
				</tbody>
			</table>

			<ul id="pagination" class="pagination-sm"></ul>

			<!-- Create Item Modal -->
			<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <h4 class="modal-title" id="myModalLabel">Create Item</h4>
			      </div>
			      <div class="modal-body">

			      		<form data-toggle="validator" action="{{ route('department-ajax.store') }}" method="POST">
			      			<div class="form-group">
								<label class="control-label" for="name">Name:</label>
								<input type="text" name="name" class="form-control" data-error="Please enter Name." required />
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="description">Description:</label>
								<input type="text" name="description" class="form-control" data-error="Please enter Description." required />
								<div class="help-block with-errors"></div>
							</div>
                            <div class="form-group">
								<label class="control-label" for="head">Head:</label>
                                <select class="form-control" name="head">
                                     <option selected disabled>Head</option>
                                        @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{!! $doctor->user_name !!}</option>
                                        @endforeach   
                                    <div class="help-block with-errors"></div>
                                </select>                           
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn crud-submit btn-success">Submit</button>
							</div>
			      		</form>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Edit Item Modal -->
			<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
			      </div>
			      <div class="modal-body">

			      		<form data-toggle="validator" action="/department-ajax/14" method="put">
			      			<div class="form-group">
								<label class="control-label" for="title">Title:</label>
								<input type="text" name="name" class="form-control" data-error="Please enter name." required />
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
								<label class="control-label" for="title">Description:</label>
								<input type="text" name="description" class="form-control" data-error="Please enter Description." required />
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group">
                                <select class="form-control" name="head" id="head">
                                     <option selected disabled>Head</option>
                                        @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{!! $doctor->user_name !!}</option>
                                        @endforeach   
                                    <div class="help-block with-errors"></div>
                                </select>                           
                            </div>
							<div class="form-group">
								<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
							</div>
			      		</form>

			      </div>
			    </div>
			  </div>
			</div>

			</div>
			</div>
		</div>
	</div>
</div>	

@endsection
	@section('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>

        <script type="text/javascript">
    	   var url = "<?php echo route('department-ajax.index')?>";
        </script>
        <script src="{{ URL::asset('js/department-ajax.js') }}"></script> 
    @endsection
