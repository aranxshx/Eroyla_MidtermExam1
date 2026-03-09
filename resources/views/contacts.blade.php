@extends('layouts.app')
@section('title', 'Contact — E-Portfolio')

@section('content')
<section class="page-section">
    <div class="container">
        <span class="section-label">// Get in Touch</span>
        <h2 class="section-title">Contact</h2>
        <p class="section-sub">Ways to reach me.</p>

        @forelse($contacts as $contact)
        @if($loop->first)
        <div class="row g-4 reveal-stagger">
        @endif
            <div class="col-md-6 col-lg-4 reveal">
                <div class="contact-card">
                    <div class="d-flex flex-column gap-3 w-100">
                        @if($contact->email)
                        <div class="d-flex align-items-center gap-3">
                            <div class="contact-icon-box ci-email">
                                <i class="bi bi-envelope-fill"></i>
                            </div>
                            <div>
                                <div class="contact-label">Email</div>
                                <a href="mailto:{{ $contact->email }}" class="contact-value">{{ $contact->email }}</a>
                            </div>
                        </div>
                        @endif
                        @if($contact->phone)
                        <div class="d-flex align-items-center gap-3">
                            <div class="contact-icon-box ci-phone">
                                <i class="bi bi-telephone-fill"></i>
                            </div>
                            <div>
                                <div class="contact-label">Phone</div>
                                <p class="contact-value">{{ $contact->phone }}</p>
                            </div>
                        </div>
                        @endif
                        @if($contact->address)
                        <div class="d-flex align-items-center gap-3">
                            <div class="contact-icon-box ci-address">
                                <i class="bi bi-geo-alt-fill"></i>
                            </div>
                            <div>
                                <div class="contact-label">Address</div>
                                <p class="contact-value">{{ $contact->address }}</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @if($loop->last)
        </div>
        @endif
        @empty
        <div class="empty-np">
            <i class="bi bi-envelope-x"></i>
            <p>No contact records found.</p>
        </div>
        @endforelse
    </div>
</section>
@endsection
