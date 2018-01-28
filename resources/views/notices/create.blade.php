@extends('layouts.app')

@section('content')
<h1 class="page-heading">Prepare a DMCA Notice</h1>

<form action="{{ route('notices.confirm') }}" method="POST">

	{{ csrf_field() }}
	<div id="form-group">
		<label>Who are we sending this to?</label>
		<select class="selectpicker form-control" name="provider_id">
			@forelse($providers as $id => $provider_name)
				<option value="{{ $id }}">{{ $provider_name }}</option>
			@empty
				<option>There Is No Provider To Select</option>
			@endforelse
		</select>
	</div>
	<br>

	<div id="form-group">
		<label>What is the title of the content that us being infringed upon.</label>
		<input type="text" class="form-control" name="infringing_title" value="{{ old('infringing_title') }}" >
	</div>
	<br>

	<div id="form-group">
		<label>What is the link where this content is located.</label>
		<input type="text" class="form-control" name="infringing_link" value="{{ old('infringing_link') }}" >
	</div>
	<br>

	<div id="form-group">
		<label>To verify that you own the content, we now need the link to the original content on your server.</label>
		<input type="text" class="form-control" name="original_link" value="{{ old('original_link') }}" >
	</div>
	<br>

	<div id="form-group">
		<label>And, finally, it might help to provide some extra information related to this DMCA notice.</label>
		<textarea name="original_description" cols="30" rows="5" class="form-control">{{ old('original_description') }}</textarea>
	</div>
	<br>

	@include('errors.list')

	<input type="submit" class="btn btn-primary btn-lg btn-block" value="Preview Notice" name="send">
</form>
@endsection