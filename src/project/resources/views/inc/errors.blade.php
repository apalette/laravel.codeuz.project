@if (count($errors) > 0)
<div class="alert alert-danger">
	@if (count($errors) == 1)
	<p>{{$errors->first()}}</p>
	@else
	<ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</div>
@endif