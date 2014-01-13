{{ '<?xml version="1.0"?>' }}

<user id="{{ $user->id }}">
	<username>{{ $user->username }}</username>
	<created_at>{{ $user->created_at->toDateString() }}</created_at>
</user>