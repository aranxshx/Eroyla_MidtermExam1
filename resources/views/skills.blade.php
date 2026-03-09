@extends('layouts.app')
@section('title', 'Skills — E-Portfolio')

@section('content')
<section class="page-section">
    <div class="container">
        <span class="section-label">// Toolkit</span>
        <h2 class="section-title">Skills &amp; Technologies</h2>
        <p class="section-sub">Everything in my current toolbox.</p>

        @forelse($skills as $skill)
        @if($loop->first)
        <div class="row g-4 reveal-stagger">
        @endif
            @php
                $lvl = strtolower($skill->level ?? '');
                $badgeClass = match(true) {
                    str_contains($lvl,'expert')       => 'skill-badge-exp',
                    str_contains($lvl,'advanced')     => 'skill-badge-adv',
                    str_contains($lvl,'intermediate') => 'skill-badge-int',
                    default                           => 'skill-badge-beg',
                };
                $barW = match(true) {
                    str_contains($lvl,'expert')       => 95,
                    str_contains($lvl,'advanced')     => 80,
                    str_contains($lvl,'intermediate') => 60,
                    default                           => 35,
                };
            @endphp
            <div class="col-md-6 col-lg-4 reveal">
                <div class="card-np">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title mb-0">{{ $skill->name }}</h5>
                            <span class="skill-badge {{ $badgeClass }}">{{ ucfirst($skill->level ?? '') }}</span>
                        </div>
                        <div class="skill-bar-wrap">
                            <div class="skill-bar" data-width="{{ $barW }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        @if($loop->last)
        </div>
        @endif
        @empty
        <div class="empty-np">
            <i class="bi bi-lightning"></i>
            <p>No skills found.</p>
        </div>
        @endforelse
    </div>
</section>
@endsection
