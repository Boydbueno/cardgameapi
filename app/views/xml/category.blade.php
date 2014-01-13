{{ '<?xml version="1.0"?>' }}
<category id="{{ $category->id }}">
	<label>{{ $category->label }}</label>
	<description>{{ $category->description }}</description>
	<created_at>{{ $category->created_at->toDateString() }}</created_at>
	<updated_at>{{ $category->updated_at->toDateString() }}</updated_at>
</category>