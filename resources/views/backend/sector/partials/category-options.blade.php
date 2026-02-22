@foreach($categories as $category)
    <option value="{{ $category->id }}">
        {!! str_repeat('&nbsp;&nbsp;&nbsp;', $level) !!}{{ $category->name }}
    </option>

    @if($category->children->count())
        @include('backend.destinations.partials.category-options', [
            'categories' => $category->children,
            'level' => $level + 1
        ])
    @endif
@endforeach