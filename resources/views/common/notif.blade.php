@if(!empty($errors))
	@if($errors->any())
	    <div class="alert alert-danger background-danger">
	    	<ul>
	        @foreach($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
	        </ul>
	    </div>
	@endif
@endif

{{-- @if(session('alt_red')) --}}
@if(Session::has('alt_red'))
	<div class="alert alert-danger background-danger">
		<button class="close mg-top5" data-dismiss="alert" aria-hidden="true" type="button">&times;</button>
		<i class="icon fa fa-check"></i> {!! Session::get('alt_red') !!}
	</div>
@endif

{{-- @if(session('alt_green')) --}}
@if(Session::has('alt_green'))
	<div class="alert alert-success background-success">
		<button class="close mg-top5" data-dismiss="alert" aria-hidden="true" type="button">&times;</button>
		<i class="icon fa fa-check"></i> {{ Session::get('alt_green') }}
	</div>
@endif
