<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Invoice</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
		}

		.invoice-box {
			width: 600px;
			margin: auto;
			border: 2px solid green;
			padding: 20px;
		}

		.center {
			text-align: center;
		}

		.right {
			text-align: right;
		}

		.bold {
			font-weight: bold;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-top: 15px;
		}

		table th,
		table td {
			border: 1px solid #aaa;
			padding: 6px;
		}

		.no-border {
			border: none !important;
		}

		.summary td {
			border: none;
			padding: 4px 6px;
		}

		.footer {
			margin-top: 30px;
		}

		.footer td {
			padding: 2px 6px;
		}
	</style>
</head>

<body>

	<div class="invoice-box">
		<div class="center">
			<h2>{{$setting->name}}</h2>
			<div class="bold">{{$setting->address}}</div>
			Phone: {{$setting->contact}}
		</div>

		<table class="summary">
			<tr>
				<td><strong>Patient:</strong> {{$invoices->patient->first_name}} {{$invoices->patient->last_name}}</td>
				<td class="right"><strong>Date:</strong> {{$invoices->created_at}}</td>
			</tr>
			<tr>
				<td><strong>Patient ID:</strong>{{ $setting->patient_prefix}}{{$invoices->patient->id}}</td>
				<td class="right"><strong>Invoice#:</strong> {{$invoices->invoice_no}}</td>
			</tr>
			<tr>
				<td><strong>Age:</strong> {{ $invoices->patient->age}}</td>
			</tr>
			<tr>
				<td><strong>Sex:</strong> {{$invoices->patient->gender}}</td>
			</tr>
			<tr>
				<td><strong>Payment:</strong> {{$invoices->payment_type}}</td>
			</tr>
		</table>

		<table>
			<thead>
				<tr>
					<th>S.N.</th>
					<th>Particular</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				@if($invoices->services)
				@foreach($invoices->serviceSales()->get() as $sales)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$sales->service_name}}</td>
					<td>Rs.{{number_format($sales->amount, 2)}}</td>
				</tr>
				@endforeach
				@elseif($invoices->opd)
				@foreach($invoices->opd_sales()->get() as $sales)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$sales->opd_name}}</td>
					<td>Rs.{{number_format($sales->opd_charge,2)}}</td>
				</tr>
				<tr>
					<td>{{$i++}}</td>
					<td>Prescription Total</td>
					<td>Rs.{{number_format($invoices->pre_total, 2)}}</td>
				</tr>
				@endforeach
				@else
				@foreach($invoices->packageSales()->get() as $sales)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$sales->package->name}}</td>
					<td>Rs.{{number_format($sales->package_price, 2)}}</td>
				</tr>
				@endforeach
				@endif
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td class="bold right"><strong>Advance: </strong>Rs. {{number_format($invoices->pre_advance, 2)}}
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="bold right"><strong>Sub Total: </strong>Rs. {{number_format($invoices->sub_total, 2)}}
					</td>
				</tr>

				<tr>
					<td></td>
					<td></td>
					<td class="bold right"><strong>Discount: </strong>Rs. {{($invoices->discount) ? $invoices->discount
						: 0.00}}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="bold right"><strong>HST({{$setting->tax_percent}}%):
						</strong>Rs.{{number_format($invoices->tax_amount,2)}}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td class="bold right"><strong>Total: </strong>Rs.{{number_format($invoices->total_amount)}}</td>
				</tr>
			</tfoot>
		</table>

		<table class="footer">
			<tr>
				<td><strong>User:</strong> {{ $invoices->user->name}}</td>
				<td class="right"><strong>Cash:</strong> {{ $invoices->cash}}</td>
			</tr>
			<tr>
				<td class="no-border"></td>
				<td class="right">------------------------------</td>
			</tr>
			<tr>
				<td class="no-border"></td>
				<td class="right"><strong>Return:</strong> {{ number_format($invoices->return, 2)}}</td>
			</tr>
		</table>

		<div class="center" style="margin-top: 20px;">
			<p>Invoice</p>
		</div>
	</div>

</body>

</html>