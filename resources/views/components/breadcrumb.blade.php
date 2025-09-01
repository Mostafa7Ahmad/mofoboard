@props(['breads' => []])

<nav class="bg-white py-3 no-print" aria-label="breadcrumb">
    <div class="container-xl">
        <ol class="breadcrumb mb-0">
            @foreach ($breads as $index => $bread)
                @if ($bread['isactive'])
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $bread['title'] }}
                    </li>
                @else
                    <li class="breadcrumb-item">
                        <a href="{{ $bread['url'] }}" class="text-muted">
                            {{ $bread['title'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ol>
    </div>
</nav>
