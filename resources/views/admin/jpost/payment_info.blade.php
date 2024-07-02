@if($amount)
<label for="">Expected Amount - ({{ number_format($amount->amount, 2) }})</label>
<input type="text" class="form-control form-control-sm" name="amount" value="{{ $amount->amount }}" placeholder="Amount" readonly>
@else
<label for="">Expected Amount </label>
<input type="text" class="form-control form-control-sm" name="amount" value="0.00" placeholder="Amount" readonly>
@endif