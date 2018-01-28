@extends('layouts.app')

@section('content')
<h1 class="page-heading">Confirm</h1>

<form action="{{ route('notices.store') }}" method="POST">

	{{ csrf_field() }}
	<textarea name="template" cols="30" rows="20" class="form-control">{{$template}}</textarea>
	@include('errors.list')
	<br>
	<input type="submit" class="btn btn-primary btn-lg btn-block" value="Notice" name="send">
</form>
@endsection