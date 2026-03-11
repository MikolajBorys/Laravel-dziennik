@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Paginacja">

        {{-- Mobile --}}
        <div class="flex items-center justify-between sm:hidden">

            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center gap-1.5 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 cursor-not-allowed">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                    </svg>
                    Poprzednia
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="inline-flex items-center gap-1.5 rounded-xl bg-white/60 border border-slate-200/80 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-white/80 hover:text-indigo-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                    </svg>
                    Poprzednia
                </a>
            @endif

            {{-- Info mobilne --}}
            <span class="text-sm text-slate-500">
                <span class="font-semibold text-slate-700">{{ $paginator->currentPage() }}</span>
                /
                <span class="font-semibold text-slate-700">{{ $paginator->lastPage() }}</span>
            </span>

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="inline-flex items-center gap-1.5 rounded-xl bg-white/60 border border-slate-200/80 px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-white/80 hover:text-indigo-600 transition-all">
                    Następna
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                    </svg>
                </a>
            @else
                <span class="inline-flex items-center gap-1.5 rounded-xl px-4 py-2.5 text-sm font-medium text-slate-300 cursor-not-allowed">
                    Następna
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                    </svg>
                </span>
            @endif

        </div>

        {{-- Desktop --}}
        <div class="hidden sm:flex sm:items-center sm:justify-between">

            {{-- Info --}}
            <div>
                <p class="text-sm text-slate-500">
                    Wyświetlanie
                    @if ($paginator->firstItem())
                        <span class="font-semibold text-slate-700">{{ $paginator->firstItem() }}</span>
                        - 
                        <span class="font-semibold text-slate-700">{{ $paginator->lastItem() }}</span>
                    @else
                        <span class="font-semibold text-slate-700">{{ $paginator->count() }}</span>
                    @endif
                    z
                    <span class="font-semibold text-slate-700">{{ $paginator->total() }}</span>
                    wyników
                </p>
            </div>

            {{-- Przyciski --}}
            <div class="flex items-center gap-1.5">

                {{-- Poprzednia --}}
                @if ($paginator->onFirstPage())
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-slate-300 cursor-not-allowed" aria-disabled="true">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                       class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/60 border border-slate-200/80 text-slate-600 hover:bg-white/80 hover:text-indigo-600 transition-all"
                       aria-label="Poprzednia strona">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                        </svg>
                    </a>
                @endif

                {{-- Numery stron --}}
                @foreach ($elements as $element)

                    {{-- Separator "..." --}}
                    @if (is_string($element))
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-sm font-medium text-slate-400">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Linki do stron --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page"
                                      class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-r from-indigo-500 to-indigo-600 text-sm font-bold text-white shadow-md shadow-indigo-500/25">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                   class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/60 border border-slate-200/80 text-sm font-medium text-slate-600 hover:bg-white/80 hover:text-indigo-600 transition-all"
                                   aria-label="Strona {{ $page }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif

                @endforeach

                {{-- Następna --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                       class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white/60 border border-slate-200/80 text-slate-600 hover:bg-white/80 hover:text-indigo-600 transition-all"
                       aria-label="Następna strona">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </a>
                @else
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-slate-300 cursor-not-allowed" aria-disabled="true">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                        </svg>
                    </span>
                @endif

            </div>
        </div>
    </nav>
@endif