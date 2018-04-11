@extends('layouts.app')

@section('content')
<h1 class="page-heading">Your Notices</h1>
<table class="table table-striped table-borderd">
	<thead>
		<th>This Content:</th>
		<th>Accessible Here:</th>
		<th>Is Infringing Upon My Work Here:</th>
		<th>Notice Sent:</th>
		<th>Content Removed:</th>
	</thead>
	<tbody>
	@foreach ($notices->where('content_removed', false) as $notice)
	<tr>
		<td>{{ $notice->infringing_title }}</td>
		<td><a href="{{ $notice->infringing_link }}">{{ $notice->infringing_link }}</a></td>
		<td><a href="{{ $notice->original_link}}">{{ $notice->original_link}}</a></td>
		<td><a href="#">{{ $notice->created_at->diffForHumans() }}</a></td>
		<td>
			<form action="{{ route("notices.update", $notice->id) }}" method="post">
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
				<input type="checkbox" name="content_removed" id="" value="{{ $notice->content_removed }}" {{ $notice->content_removed ? "checked":"" }}/>
				<button id="" type="submit">x</button>
			</form>
		</td>
	</tr>
	@endforeach
	</tbody>
</table>
@unless($notices->where('content_removed', false)->count())
	<p class="text-center">You haven't sent any DMCA notices yet!</p>
@endunless
<br><hr><br>
@if ($notices->where('content_removed', true)->count())
<h1 class="page-heading">Archived Notices</h1>
<table class="table table-striped table-borderd">
	<thead>
		<th>This Content:</th>
		<th>Accessible Here:</th>
		<th>Is Infringing Upon My Work Here:</th>
		<th>Notice Sent:</th>
		<th>Content Removed:</th>
	</thead>

	<tbody>
	@foreach ($notices->where('content_removed', true) as $notice)
	<tr>
		<td>{{ $notice->infringing_title }}</td>
		<td><a href="{{ $notice->infringing_link }}">{{ $notice->infringing_link }}</a></td>
		<td><a href="{{ $notice->original_link}}">{{ $notice->original_link}}</a></td>
		<td><a href="#">{{ $notice->created_at->diffForHumans() }}</a></td>
		<td>
			<form action="{{ route("notices.update", $notice->id) }}" method="post">
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
				<input type="checkbox" name="content_removed" id="" value="{{ $notice->content_removed }}" {{ $notice->content_removed ? "checked":"" }}/>
				<button id="" type="submit">x</button>
			</form>
		</td>
	</tr>
	@endforeach
	</tbody>
</table>
@endif
@endsection
