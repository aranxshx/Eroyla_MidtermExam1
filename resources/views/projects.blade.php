@extends('layouts.app')
@section('title', 'Projects — E-Portfolio')

@section('content')
<section class="page-section">
    <div class="container">
        <span class="section-label">// My Work</span>
        <h2 class="section-title">Projects</h2>
        <p class="section-sub">A selection of things I've built.</p>

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
                            {{ $project->description }}
                        </p>
                        @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank" class="project-link-btn">
                            <i class="bi bi-github"></i> View on GitHub
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
            <i class="bi bi-folder2-open"></i>
            <p>No projects found.</p>
        </div>
        @endforelse
    </div>
</section>
@endsection
