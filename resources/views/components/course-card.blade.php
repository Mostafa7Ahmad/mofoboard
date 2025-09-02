@props(['course' => null, 'showBadge' => true, 'showActions' => true])

@php
    $title = data_get($course, 'title', 'اسم الكورس');
    $slug = data_get($course, 'slug', '#');
    $image = data_get($course, 'image_url', asset('images/default/image.jpg'));
    $excerpt = data_get($course, 'excerpt', '');
    $price = data_get($course, 'price');
    $oldPrice = data_get($course, 'old_price');
    $isFree = data_get($course, 'is_free', false);
    $rating = (float) data_get($course, 'rating', 0);
    $students = (int) data_get($course, 'students_count', 0);
    $duration = data_get($course, 'duration');
    $tags = data_get($course, 'tags', []);
@endphp

<div class="card h-100 shadow-lg border-0 rounded-3 overflow-hidden">
    {{-- صورة --}}
    <div class="position-relative overflow-hidden">
        <a>
            <img src="{{ $image }}" class="card-img-top img-fluid transition-scale" alt="{{ $title }}">
        </a>
        @if ($showBadge)
            <div class="position-absolute top-0 start-0 m-2">
                @if ($isFree)
                    <span class="badge bg-success px-3 py-2 rounded-pill shadow">مجانًا</span>
                @elseif($oldPrice && $price && $oldPrice > $price)
                    @php $percent = round((($oldPrice - $price) / $oldPrice) * 100); @endphp
                    <span class="badge bg-danger px-3 py-2 rounded-pill shadow">-{{ $percent }}%</span>
                @endif
            </div>
        @endif
    </div>

    {{-- محتوى --}}
    <div class="card-body d-flex flex-column p-3">
        <h5 class="card-title fw-bold text-truncate" title="{{ $title }}">
            <a class="text-dark text-decoration-none">
                {{ $title }}
            </a>
        </h5>

        @if ($excerpt)
            <p class="card-text text-muted small mb-2">{{ Str::limit($excerpt, 100) }}</p>
        @endif

        {{-- تقييم --}}
        <div class="d-flex align-items-center mb-2" dir="rtl">
            @php
                $full = floor($rating);
                $half = $rating - $full >= 0.5;
                $empty = 5 - $full - ($half ? 1 : 0);
            @endphp

            @for ($i = 0; $i < $empty; $i++)
                <i class="far fa-star text-warning"></i>
            @endfor
            @if ($half)
                <i class="fas fa-star-half-alt text-warning"></i>
            @endif
            @for ($i = 0; $i < $full; $i++)
                <i class="fas fa-star text-warning"></i>
            @endfor

            <span class="small text-muted ms-1">({{ number_format($rating, 1) }})</span>
        </div>

        {{-- معلومات إضافية --}}
        <p class="small text-muted mb-2">
            <i class="bi bi-people"></i> {{ $students }} طالب
            @if ($duration)
                • <i class="bi bi-clock"></i> {{ $duration }}
            @endif
        </p>

        {{-- السعر --}}
        <div class="mb-3">
            @if ($isFree)
                <span class="fw-bold text-success">مجانًا</span>
            @elseif ($oldPrice && $oldPrice > $price)
                <span class="fw-bold">{{ number_format($price, 2) }} ج.م</span>
                <span class="text-muted text-decoration-line-through small">{{ number_format($oldPrice, 2) }}
                    ج.م</span>
            @elseif($price)
                <span class="fw-bold">{{ number_format($price, 2) }} ج.م</span>
            @else
                <span class="text-muted">تواصل لمعرفة السعر</span>
            @endif
        </div>

        {{-- تاجز --}}
        @if (!empty($tags))
            <div class="mb-3">
                @foreach (array_slice($tags, 0, 3) as $tag)
                    <span class="badge rounded-pill bg-light text-dark">{{ $tag }}</span>
                @endforeach
                @if (count($tags) > 3)
                    <span class="badge bg-secondary rounded-pill">+{{ count($tags) - 3 }}</span>
                @endif
            </div>
        @endif

        @if ($showActions)
            <div class="mt-auto d-flex gap-2">
                {{-- زر عرض --}}
                <a href="{{ url($slug) }}"
                    class="btn btn-sm btn-primary flex-fill d-flex align-items-center justify-content-center gap-2">
                    <i class="fas fa-eye"></i>
                    <span>عرض</span>
                </a>

                {{-- زر السلة --}}
                <form method="get" action="#" class="flex-fill">
                    @csrf
                    <button type="submit"
                        class="btn btn-sm btn-outline-secondary w-100 d-flex align-items-center justify-content-center gap-2">
                        <i class="fas fa-cart-plus"></i>
                        <span>اشتراك</span>
                    </button>
                </form>
            </div>
        @endif


    </div>
</div>

{{-- تحسين شكل الصورة عند الهوفر --}}
<style>
    .transition-scale {
        transition: transform .3s ease;
    }

    .transition-scale:hover {
        transform: scale(1.05);
    }

    .hover-shadow:hover {
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1) !important;
    }
</style>
