@props(['note'])

@if($note)
<div class="border-l-4 border-brand-500 bg-brand-50 rounded-r-xl p-6 md:p-8">
    <div class="flex items-start gap-4">
        <div class="flex-shrink-0">
            <div class="w-12 h-12 rounded-full bg-brand-200 flex items-center justify-center">
                <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
        </div>
        <div class="flex-1">
            <h3 class="font-semibold text-brand-700 mb-2">Archivist's Note</h3>
            <div class="text-text-secondary leading-relaxed prose prose-sm max-w-none">
                {!! nl2br(e($note)) !!}
            </div>
            <p class="mt-4 text-sm text-brand-500 font-medium">— The Archive Monument Team</p>
        </div>
    </div>
</div>
@endif
