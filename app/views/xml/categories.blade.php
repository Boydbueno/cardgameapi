{{ '<?xml version="1.0"?>' }}
<categories>
	@foreach($categories as $category)
	
		<category id="{{ $category->id }}">
			<label>{{ $category->label }}</label>
			<description>{{ $category->description }}</description>
			<created_at>{{ $category->created_at->toDateString() }}</created_at>
		</category>

	@endforeach
</categories>