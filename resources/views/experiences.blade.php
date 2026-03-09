@extends('layouts.app')
@section('title', 'Experience — E-Portfolio')

@section('content')
<section class="page-section">
    <div class="container">
        <span class="section-label">// Career</span>
        <h2 class="section-title">Work Experience</h2>
        <p class="section-sub">My professional journey.</p>

        @forelse($experiences as $exp)
        @if($loop->first)
        <div class="row justify-content-center">
        <div class="col-lg-8">
        <div class="timeline-np reveal-stagger">
        @endif
            <div class="tl-item reveal">
                <span class="tl-dot"></span>
                <div class="tl-card">
                    <span class="tl-date">
                        @if($exp->start_date)
                            {{ (strtotime($exp->start_date) !== false) ? \Carbon\Carbon::parse($exp->start_date)->format('M Y') : $exp->start_date }}
                        @endif
                        @if($exp->end_date)
                            &mdash; {{ (strtotime($exp->end_date) !== false) ? \Carbon\Carbon::parse($exp->end_date)->format('M Y') : $exp->end_date }}
                        @elseif($exp->start_date)
                            &mdash; Present
                        @endif
                    </span>
                    <div class="tl-role">{{ $exp->position }}</div>
                    <div class="tl-company">{{ $exp->company }}</div>
                    @if($exp->description)
                    <p class="tl-desc">{{ $exp->description }}</p>
                    @endif
                </div>
            </div>
        @if($loop->last)
        </div>
        </div>
        </div>
        @endif
        @empty
        <div class="empty-np">
            <i class="bi bi-clock-history"></i>
            <p>No experience records found.</p>
        </div>
        @endforelse
    </div>
</section>
@endsection
