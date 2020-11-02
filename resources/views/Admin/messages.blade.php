@if(session("success"))
<div class="w3-white w3-panel w3-leftbar w3-border-green">
	<p class="w3-text-green">
		{{ session("success") }}
	</p>
</div>
@endif

@if ($errors->any())
<div class="w3-pale-red w3-panel w3-leftbar w3-border-red">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif