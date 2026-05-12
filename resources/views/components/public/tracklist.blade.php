@props(['tracklist'])

@if($tracklist && (isset($tracklist['a']) || isset($tracklist['b'])))
<div class="bg-brand-50 rounded-xl p-6 md:p-8">
    <h3 class="text-h4 mb-6 flex items-center gap-2">
        <svg class="w-5 h-5 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
        </svg>
        Tracklist
    </h3>

    <div class="grid md:grid-cols-2 gap-8">
        <!-- Side A -->
        @if(isset($tracklist['a']) && count($tracklist['a']))
        <div>
            <h4 class="font-semibold text-brand-600 mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-full bg-brand-600 text-text-inverse flex items-center justify-center text-sm font-bold">A</span>
                Side A
            </h4>
            <ol class="space-y-3">
                @foreach($tracklist['a'] as $index => $track)
                <li class="flex items-start gap-3 text-text-secondary">
                    <span class="text-brand-400 font-medium min-w-[1.5rem]">{{ $index + 1 }}.</span>
                    <span class="flex-1">{{ is_array($track) ? $track['title'] : $track }}</span>
                    @if(is_array($track) && isset($track['duration']))
                    <span class="text-text-muted text-sm">{{ $track['duration'] }}</span>
                    @endif
                </li>
                @endforeach
            </ol>
        </div>
        @endif

        <!-- Side B -->
        @if(isset($tracklist['b']) && count($tracklist['b']))
        <div>
            <h4 class="font-semibold text-brand-600 mb-4 flex items-center gap-2">
                <span class="w-8 h-8 rounded-full bg-brand-600 text-text-inverse flex items-center justify-center text-sm font-bold">B</span>
                Side B
            </h4>
            <ol class="space-y-3">
                @foreach($tracklist['b'] as $index => $track)
                <li class="flex items-start gap-3 text-text-secondary">
                    <span class="text-brand-400 font-medium min-w-[1.5rem]">{{ $index + 1 }}.</span>
                    <span class="flex-1">{{ is_array($track) ? $track['title'] : $track }}</span>
                    @if(is_array($track) && isset($track['duration']))
                    <span class="text-text-muted text-sm">{{ $track['duration'] }}</span>
                    @endif
                </li>
                @endforeach
            </ol>
        </div>
        @endif
    </div>
</div>
@endif
