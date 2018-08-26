@if(!empty($errors))
	@if($errors->any())
		<div class="alert alert-danger background-danger">
			<button type="button" class="close mg-top2" data-dismiss="alert" aria-label="Close">
				<i class="fa fa-times text-white"></i>
			</button>
			
			<ul>
		        @foreach($errors->all() as $error)
		            <li class="mb-1"><strong><i class="fa fa-warning pr-2"></i></strong>  {{ $error }}</li>
		        @endforeach
	        </ul>
		</div>
	@endif
@endif

{{-- @if(session('alt_red')) --}}
@if(Session::has('alt_red'))
<div class="alert alert-danger background-danger">
	<button type="button" class="close mg-top2" data-dismiss="alert" aria-label="Close">
		<i class="fa fa-times text-white"></i>
	</button>
	<strong><i class="fa fa-warning pr-2"></i></strong> 
	{{ Session::get('alt_red') }}
</div>
@endif

{{-- @if(session('alt_green')) --}}
@if(Session::has('alt_green'))
<div class="alert alert-success background-success">
	<button type="button" class="close mg-top2" data-dismiss="alert" aria-label="Close">
		<i class="fa fa-times text-white"></i>
	</button>
	<strong><i class="fa fa-check pr-2"></i></strong> 
	{{ Session::get('alt_green') }}
</div>
@endif
