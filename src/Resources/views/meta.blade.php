<title>{{ $meta->title()->toString() }}</title>
@foreach ($meta->tags()->toArray() as $key => $value)
    {!! $value !!}
@endforeach