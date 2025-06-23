<!-- Edit Modal -->
<div class="modal fade" id="editAppointment" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Appointment </h4>
			</div>
			<div class="modal-body">
				<div class="row">
					{!! Form::open(array('route' => 'appointment.updated','method'=>'POST', )) !!}

					<input name="id" type="hidden" class="form-control" id="id">
					<div class=" col-md-4 form-group">
						<label>Patient:</label>
						<select name="patient_id" class="form-control" id="patient_id">
							<option></option>
							@foreach($patients as $patient)
							<option value="{{$patient->id}}">{{ $patient->first_name}} {{ $patient->last_name}}</option>
							@endforeach
						</select>
					</div>

					<div class=" col-md-4 form-group">
						<label>Doctor:</label>
						<select name="doctor_id" class="form-control doctor_select" required id="doctor_id">
							<option></option>
							@foreach($doctors as $doctor)
							<option value="{{$doctor->id}}">{{ $doctor->employee->first_name}} {{
								$doctor->employee->last_name}}</option>
							@endforeach
						</select>
					</div>
					<div class=" col-md-4 form-group">
						<label>Available Time:</label>
						<div class="available_time">
							<input type="text" name="time" class="form-control" id="time">
						</div>
					</div>
					<div class="col-md-4 form-group">
						<label>Appointment Date:</label>
						<input type="text" name="appointment_date" class="form-control datepicker1"
							data-date-start-date="0d" id="date" required="">
					</div>

					<div class=" col-md-4 form-group">
						<label>Name:</label>
						{!! Form::text('name', null, array('class' => 'form-control', 'required'=>'required',
						'id'=>'name')) !!}
					</div>

					<div class=" col-md-4 form-group">re
						<label>Description:</label>
						{!! Form::text('description', null, array('class' => 'form-control', 'id'=>'description')) !!}
					</div>

				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					<button class="btn btn-danger" type="reset">Reset</button>
					<button class="btn btn-success" type="submit">Save changes</button>
				</div>

				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
<style>
	.prescription-table {
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 20px;
	}

	.prescription-table th,
	.prescription-table td {
		border: 1px solid #ccc;
		text-align: center;
		padding: 6px;
	}

	.prescription-table th {
		background-color: #f5f5f5;
		font-weight: bold;
	}

	.prescription-input {
		width: 60px;
		text-align: center;
	}

	.full-width {
		width: 100%;
		margin-bottom: 10px;
	}

	.modal-body {
		padding: 30px;
	}
</style>
<!-- Edit Modal -->
<div class="modal fade" id="editPF" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Prescription Form</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					{!! Form::open(array('route' => 'appointment.updatedpf','method'=>'POST', )) !!}

					<input name="id" type="hidden" class="form-control" id="idpf">

					<div class=" col-md-4 form-group">
						<label>Patient:</label>
						<select name="patient_id" class="form-control" id="patient_idd" required>
							<option></option>
							@foreach($patients as $patient)
							<option value="{{$patient->id}}">{{ $patient->first_name }} {{ $patient->last_name }}
							</option>
							@endforeach
						</select>
					</div>

					<div class=" col-md-4 form-group">
						<label>Doctor:</label>
						<select name="doctor_id" class="form-control doctor_select" required id="doctor_idd">
							<option></option>
							@foreach($doctors as $doctor)
							<option value="{{$doctor->id}}">{{ $doctor->employee->first_name}} {{
								$doctor->employee->last_name}}</option>
							@endforeach
						</select>
					</div>
					<!-- Prescription Table Starts -->
					<table class="prescription-table">
						<thead>
							<tr>
								<th colspan="4">RIGHT</th>
								<th colspan="4">LEFT</th>
							</tr>
							<tr>
								<th></th>
								<th>SPH</th>
								<th>CYL</th>
								<th>AXIS</th>
								<th>SPH</th>
								<th>CYL</th>
								<th>AXIS</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Dist.</td>
								<td><input type="text" required name="r_dist_sph" id="r_dist_sph"
										class="prescription-input"></td>
								<td><input type="text" required name="r_dist_cyl" id="r_dist_cyl"
										class="prescription-input"></td>
								<td><input type="text" required name="r_dist_axis" id="r_dist_axis"
										class="prescription-input"></td>
								<td><input type="text" required name="l_dist_sph" id="l_dist_sph"
										class="prescription-input"></td>
								<td><input type="text" required name="l_dist_cyl" id="l_dist_cyl"
										class="prescription-input"></td>
								<td><input type="text" required name="l_dist_axis" id="l_dist_axis"
										class="prescription-input"></td>
							</tr>
							<tr>
								<td>Near</td>
								<td><input type="text" required name="r_near_sph" id="r_near_sph"
										class="prescription-input"></td>
								<td><input type="text" required name="r_near_cyl" id="r_near_cyl"
										class="prescription-input"></td>
								<td><input type="text" required name="r_near_axis" id="r_near_axis"
										class="prescription-input"></td>
								<td><input type="text" required name="l_near_sph" id="l_near_sph"
										class="prescription-input"></td>
								<td><input type="text" required name="l_near_cyl" id="l_near_cyl"
										class="prescription-input"></td>
								<td><input type="text" required name="l_near_axis" id="l_near_axis"
										class="prescription-input"></td>
							</tr>
						</tbody>
					</table>

					<div class="form-group">
						<label>Frame:</label>
						<input type="text" required name="frame" id="frame" class="form-control full-width">
					</div>

					<div class="form-group">
						<label>Lenses:</label>
						<input type="text" required name="lenses" id="lenses" class="form-control full-width">
					</div>

					<div class="form-group">
						<label>Specific Instructions if any:</label>
						<textarea name="instructions" id="instructions" class="form-control full-width"
							rows="2"></textarea>
					</div>

					<div class="row">
						<div class="col-md-4 form-group">
							<label>Frame Charges (Rs):</label>
							<input type="text" required name="framecharge" id="framecharge" class="form-control">
						</div>
						<div class="col-md-4 form-group">
							<label>Lense Charges (Rs):</label>
							<input type="text" required name="lensecharge" id="lensecharge" class="form-control">
						</div>
						<div class="col-md-4 form-group">
							<label>Total (Rs):</label>
							<input type="text" required name="total" id="total" class="form-control">
						</div>
						<div class="col-md-4 form-group">
							<label>Advance (Rs):</label>
							<input type="text" required name="advance" id="advance" class="form-control">
						</div>
						<div class="col-md-4 form-group">
							<label>Balance (Rs):</label>
							<input type="text" required name="balance" id="balance" class="form-control">
						</div>
					</div>
					<!-- Prescription Table Ends -->

				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
					<button class="btn btn-danger" type="reset">Reset</button>
					<button class="btn btn-success" type="submit">Save changes</button>
				</div>

				{{Form::close()}}
			</div>
		</div>
	</div>
</div>
</div>

<script>
	$(document).ready( function() {
            $('.doctor_select').on('change', function() {
                var id = $('.doctor_select').val();
                //ajax
              $('.available_time').load({!! json_encode(url('/days/')) !!}+'/'+id);
            });
                
        
        });
</script>