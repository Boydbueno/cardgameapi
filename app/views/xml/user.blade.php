{{ '<?xml version="1.0"?>' }}

<user id="{{ $user->id }}">
	<username>{{ $user->username }}</username>
	<created_at>{{ $user->created_at->toDateString() }}</created_at>
	<updated_at>{{ $user->created_at->toDateString() }}</updated_at>
</user>