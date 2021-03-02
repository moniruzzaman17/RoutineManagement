<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">CPSCN Routine Management</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Add
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Shif</a>
						<a class="dropdown-item" href="#">Class</a>
						<a class="dropdown-item" href="#">Group</a>
						<a class="dropdown-item" href="#">Section</a>
						<a class="dropdown-item" href="#">Teacher</a>
						{{-- <div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a> --}}
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Create Routine</a>
				</li>
				@auth('web')
				<li class="nav-item" style="float: right;">
					<a href="" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
				</li>
				@endauth
			</ul>
		</div>
	</nav>
</div>