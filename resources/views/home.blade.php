@extends('layouts.app')
@section('title', ($profile->name ?? 'Portfolio') . ' â€” E-Portfolio')

@section('content')

{{-- ===================== HERO ===================== --}}
<section class="hero-np">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <span class="avail-badge">
                    <span class="pulse-dot"></span>Available for work
                </span>

                <h1 class="reveal">{{ $profile->name ?? 'Your Name' }}</h1>
                <p class="hero-title reveal" style="transition-delay:.07s">
                    {{ $profile->title ?? 'Full-Stack Developer' }}
                </p>
                <p class="hero-bio reveal" style="transition-delay:.14s">
                    {{ $profile->bio ?? 'Crafting thoughtful digital experiences at the intersection of code and design.' }}
                </p>

                <div class="d-flex flex-wrap gap-2 reveal" style="transition-delay:.21s">
                    <a href="/projects" class="btn-np">View Projects <i class="bi bi-arrow-right"></i></a>
                    <a href="/contacts" class="btn-np-outline">Get in Touch</a>
                </div>

                <div class="d-flex flex-wrap gap-3 mt-5 reveal" style="transition-delay:.28s">
                    <div class="stat-chip">
                        <span class="stat-num">{{ $skillCount }}</span>
                        <span class="stat-lbl">Skills</span>
                    </div>
                    <div class="stat-chip">
                        <span class="stat-num">{{ $projectCount }}</span>
                        <span class="stat-lbl">Projects</span>
                    </div>
                    <div class="stat-chip">
                        <span class="stat-num">{{ $expCount }}</span>
                        <span class="stat-lbl">Roles</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 text-center d-none d-lg-block reveal" style="transition-delay:.12s">
                @if($profile && $profile->profile_image)
                <img src="{{ asset($profile->profile_image) }}"
                     alt="{{ $profile->name }}"
                     class="hero-avatar-img">
                @else
                <div style="width:320px;height:320px;margin:auto;border-radius:var(--r-xl);
                            background:radial-gradient(circle at 30% 30%, rgba(0,102,204,0.12), transparent 65%),
                                       radial-gradient(circle, rgba(0,0,0,0.08) 1px, transparent 1px) 0 0 / 20px 20px;
                            border:1px solid var(--border);
                            display:flex;align-items:center;justify-content:center;">
                    <i class="bi bi-person-circle" style="font-size:5rem;color:rgba(0,102,204,0.25)"></i>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<hr class="divider-np">

{{-- ===================== FEATURED PROJECTS ===================== --}}
<section class="page-section">
    <div class="container">
        <span class="section-label">// Featured Work</span>
        <h2 class="section-title">Selected Projects</h2>
        <p class="section-sub">A handful of things I've built and shipped.</p>

        @forelse($projects as $project)
        @if($loop->first)
        <div class="row g-4 reveal-stagger">
        @endif
            <div class="col-md-6 col-lg-4 reveal">
                <div class="project-card-fp">
                    <div class="project-thumb">
                        @if($project->image)
                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="project-thumb-img">
                        @else
                        <i class="bi bi-code-slash thumb-icon"></i>
                        @endif
                    </div>
                    <div class="project-body">
                        <h5 style="font-family:var(--font-display);font-weight:700;letter-spacing:-0.02em;margin-bottom:.4rem">
                            {{ $project->title }}
                        </h5>
                        <p style="font-size:.88rem;color:var(--text-2);line-height:1.6;margin-bottom:1rem">
                            {{ Str::limit($project->description ?? '', 110) }}
                        </p>
                        @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank" class="project-link-btn">
                            <i class="bi bi-github"></i> GitHub
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        @if($loop->last)
        </div>
        @endif
        @empty
        <div class="empty-np">
            <i class="bi bi-folder2-open"></i><p>No projects yet.</p>
        </div>
        @endforelse

        @if($projects->isNotEmpty())
        <div class="text-center mt-5">
            <a href="/projects" class="btn-np-outline">All Projects <i class="bi bi-arrow-right"></i></a>
        </div>
        @endif
    </div>
</section>

<hr class="divider-np">

{{-- ===================== SKILLS PREVIEW ===================== --}}
<section class="page-section">
    <div class="container">
        <div class="row align-items-start g-5">
            <div class="col-lg-4">
                <span class="section-label">// Toolkit</span>
                <h2 class="section-title">Skills &amp; Tech</h2>
                <p class="section-sub mb-4">Technologies I use to bring ideas to life.</p>
                <a href="/skills" class="btn-np-outline">All Skills <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="col-lg-8 reveal-stagger">
                @forelse($skills->take(6) as $skill)
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
                <div class="skill-row reveal">
                    <span class="skill-name">{{ $skill->name }}</span>
                    <span class="skill-badge {{ $badgeClass }}">{{ ucfirst($skill->level ?? '') }}</span>
                    <div class="skill-bar-wrap">
                        <div class="skill-bar" data-width="{{ $barW }}%"></div>
                    </div>
                </div>
                @empty
                <div class="empty-np"><i class="bi bi-lightning"></i><p>No skills yet.</p></div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<hr class="divider-np">

{{-- ===================== EXPERIENCE PREVIEW ===================== --}}
<section class="page-section">
    <div class="container">
        <span class="section-label">// Career</span>
        <h2 class="section-title">Work Experience</h2>
        <p class="section-sub">Where I've worked and what I've built.</p>

        @forelse($experiences->take(3) as $exp)
        @if($loop->first)
        <div class="row justify-content-center"><div class="col-lg-8">
        <div class="timeline-np reveal-stagger">
        @endif
            <div class="tl-item reveal">
                <span class="tl-dot"></span>
                <div class="tl-card">
                    <span class="tl-date">
                        @if($exp->start_date)
                            {{ \Carbon\Carbon::parse($exp->start_date)->format('M Y') }}
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
                    <p class="tl-desc">{{ Str::limit($exp->description, 160) }}</p>
                    @endif
                </div>
            </div>
        @if($loop->last)
        </div>{{-- timeline-np --}}
        <div class="text-center mt-5">
            <a href="/experiences" class="btn-np-outline">Full Experience <i class="bi bi-arrow-right"></i></a>
        </div>
        </div></div>{{-- col / row --}}
        @endif
        @empty
        <div class="empty-np"><i class="bi bi-clock-history"></i><p>No experience listed.</p></div>
        @endforelse
    </div>
</section>

{{-- ===================== CONTACT CTA ===================== --}}
<section class="accent-band">
    <div class="container text-center">
        <span class="section-label">// Let's talk</span>
        <h2 class="section-title mb-3">Ready to work together?</h2>
        <p class="section-sub mx-auto mb-4" style="max-width:500px">
            I'm open to new opportunities â€” let's build something great.
        </p>
        @if($contacts->isNotEmpty())
        <div class="d-flex flex-wrap justify-content-center gap-4 mb-5">
            @foreach($contacts as $c)
                @if($c->email)
                <a href="mailto:{{ $c->email }}" style="color:rgba(255,255,255,0.75);font-size:.9rem;font-weight:500;display:flex;align-items:center;gap:6px;">
                    <i class="bi bi-envelope"></i> {{ $c->email }}
                </a>
                @endif
                @if($c->phone)
                <a href="tel:{{ $c->phone }}" style="color:rgba(255,255,255,0.75);font-size:.9rem;font-weight:500;display:flex;align-items:center;gap:6px;">
                    <i class="bi bi-telephone"></i> {{ $c->phone }}
                </a>
                @endif
            @endforeach
        </div>
        @endif
        <a href="/contacts" class="btn-np">Get in Touch <i class="bi bi-arrow-right"></i></a>
    </div>
</section>

@endsection

