<!-- Edit Modal -->
<div class="modal fade" id="editLab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 75%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Lab</h4>
			</div>

			{!! Form::model($patient, ['enctype'=>'multipart/form-data','method' => 'PATCH','route' =>
			['labs.update', $patient->id]]) !!}
			<div class="modal-body">
				<div class="row">
					{{-- Lab Form Fields --}}
					<div class="col-md-4 form-group">
						<label>Created Date:</label>
						{!! Form::text('created_date', null, ['class' => 'form-control datepicker']) !!}
					</div>
					<div class="col-md-4 form-group">
						<label>Bill:</label>
						{!! Form::text('bill', null, ['class' => 'form-control']) !!}
					</div>
					<div class="col-md-4 form-group">
						<label>Customer Name:</label>
						{!! Form::text('cust_name', null, ['class' => 'form-control', 'required' => true]) !!}
					</div>
					<div class="col-md-4 form-group">
						<label>Frame Type:</label>
						{!! Form::text('frame_type', null, ['class' => 'form-control']) !!}
					</div>
					<div class="col-md-4 form-group">
						<label>Fitter:</label>
						{!! Form::text('fitter', null, ['class' => 'form-control']) !!}
					</div>
					<div class="col-md-4 form-group">
						<label>Receive Date:</label>
						{!! Form::text('receive_date', null, ['class' => 'form-control datepicker']) !!}
					</div>
					<div class="col-md-4 form-group">
						<label>Delivery Date:</label>
						{!! Form::text('delivery_date', null, ['class' => 'form-control datepicker']) !!}
					</div>
					<div class="col-md-4 form-group">
						<label>Time:</label>
						{!! Form::time('time', null, ['class' => 'form-control']) !!}
					</div>

				</div>

				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					<button class="btn btn-danger" type="reset">Reset</button>
					<button class="btn btn-success" type="submit">Save changes</button>
					{!! Form::close() !!}

					@permission('patient.destroy')
					{!! Form::open(['method' => 'DELETE','route' => ['patient.destroy', $patient->id],'id'
					=>'deleteConfirm','style'=>'display:inline','class'=>'pull-left']) !!}
					<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>
						Delete</button>
					{!! Form::close() !!}
					@endpermission
				</div>
			</div>
		</div>
	</div>
</div>