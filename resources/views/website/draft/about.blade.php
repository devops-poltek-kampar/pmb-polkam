@extends('website.layout')


@section('content')
    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 align-items-stretch">

                <div class="col-lg-5 order-lg-2" data-aos="fade-left" data-aos-delay="200">
                    <aside class="showcase">
                        <figure class="showcase-main">
                            <img src="assets/img/about/about-portrait-7.webp" alt="Our Journey" class="img-fluid">
                            <figcaption class="badge-note" data-aos="zoom-in" data-aos-delay="350">
                                <i class="bi bi-graph-up-arrow"></i>
                                <div>
                                    <strong>Growing Strong</strong>
                                    <small>Lorem ipsum dolor sit amet.</small>
                                </div>
                            </figcaption>
                        </figure>
                    </aside>
                </div>

                <div class="col-lg-7 order-lg-1" data-aos="fade-right" data-aos-delay="200">
                    <article class="intro-card">
                        <div class="intro-head">
                            <span class="kicker"><i class="bi bi-stars me-1"></i>Our Story</span>
                            <h2>Designing Meaningful Products With Lasting Impact</h2>
                        </div>

                        <div class="intro-body">
                            <p class="lead">Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                                accusantium doloremque laudantium totam rem.</p>
                            <p>Quo rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                                beatae vitae dicta sunt explicabo nemo enim ipsam.</p>

                            <div class="feature-list row gy-3">
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="250">
                                    <div class="feature-item">
                                        <i class="bi bi-shield-check"></i>
                                        <div class="text">
                                            <h6>Reliable Delivery</h6>
                                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                                blanditiis.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                    <div class="feature-item">
                                        <i class="bi bi-palette2"></i>
                                        <div class="text">
                                            <h6>Human-Centered Design</h6>
                                            <p>Temporibus autem quibusdam et aut officiis debitis aut rerum
                                                necessitatibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="metric-band" data-aos="fade-up" data-aos-delay="350">
                                <div class="metric">
                                    <span class="value">9+</span>
                                    <span class="label">Years</span>
                                </div>
                                <div class="divider"></div>
                                <div class="metric">
                                    <span class="value">520</span>
                                    <span class="label">Projects</span>
                                </div>
                                <div class="divider"></div>
                                <div class="metric">
                                    <span class="value">30</span>
                                    <span class="label">Experts</span>
                                </div>
                            </div>

                            <div class="actions d-flex flex-wrap align-items-center gap-3" data-aos="fade-up"
                                data-aos-delay="400">
                                <a href="#" class="btn btn-accent">
                                    <i class="bi bi-rocket-takeoff me-1"></i> Explore Capabilities
                                </a>
                                <a href="#" class="link-more">
                                    Learn about our culture <i class="bi bi-arrow-right-short"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->
@endsection
