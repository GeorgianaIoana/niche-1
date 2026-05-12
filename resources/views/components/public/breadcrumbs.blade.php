@props(['items' => []])

<nav aria-label="Breadcrumb" class="mb-6">
    <ol class="flex items-center gap-2 text-sm">
        <li>
            <a href="{{ route('home') }}" class="text-text-muted hover:text-text-primary transition-colors">
                Home
            </a>
        </li>
        @foreach($items as $item)
            <li class="flex items-center gap-2">
                <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                @if(isset($item['url']))
                    <a href="{{ $item['url'] }}" class="text-text-muted hover:text-text-primary transition-colors">
                        {{ $item['label'] }}
                    </a>
                @else
                    <span class="text-text-primary font-medium">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
