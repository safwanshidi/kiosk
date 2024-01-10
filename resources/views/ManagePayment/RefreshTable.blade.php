
@if(!$receipt->isEmpty())
	@foreach($receipt as $single_receipt)
		<tr>
			<td>{{$single_receipt->id}}</td>
			<td>{{$single_receipt->date}}</td>
			<td>{{$single_receipt->amount}}</td>
			<td><a href="/staff/bursary/viewReceiptDetail?id={{$single_receipt->id}}&type=2">View Detail</a></td>
		</tr>
	@endforeach		
@else
	<tr>
		<td class="item-center fs-4 fw-normal" colspan="4">No result</th>
	</tr>	
@endif	
