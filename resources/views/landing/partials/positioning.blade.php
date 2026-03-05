    {{-- ==================== COMPETITIVE POSITIONING ==================== --}}
    <section id="positioning" class="section section-alt">
        <div class="mx-auto max-w-7xl px-6 md:px-8 xl:px-10">
            <div class="fade-up mb-12 text-center">
                <div class="chip mb-4">
                    <span class="chip-dot"></span>
                    {{ $copy['positioning']['chip'] }}
                </div>
                <h2 class="section-title mb-4">{{ $copy['positioning']['title'] }}</h2>
                <p class="section-subtitle mx-auto">
                    {{ $copy['positioning']['subtitle'] }}
                </p>
            </div>

            <div class="card fade-up overflow-hidden p-0">
                <div class="overflow-x-auto">
                    <table class="compare-table min-w-[680px]">
                        <thead>
                            <tr>
                                <th>{{ $copy['positioning']['header_problem'] }}</th>
                                <th class="min-w-[280px]">{{ $copy['positioning']['header_solution'] }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($copy['positioning']['rows'] as $row)
                                <tr>
                                    <td>{{ $row['problem'] }}</td>
                                    <td class="font-semibold text-pantoo-700 dark:text-pantoo-400">
                                        {{ $row['solution'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
