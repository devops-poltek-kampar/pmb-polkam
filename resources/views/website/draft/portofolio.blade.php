@extends('website.layout')


@section('content')
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Check Our&nbsp; Portfolio</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center mt-4">
                        <ul class="portfolio-filters isotope-filters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-photography">Photography</li>
                            <li data-filter=".filter-design">Design</li>
                            <li data-filter=".filter-automotive">Automotive</li>
                            <li data-filter=".filter-nature">Nature</li>
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
                        <div class="portfolio-wrap">
                            <img src="assets-website/img/portfolio/portfolio-portrait-1.webp" class="img-fluid"
                                alt="Portfolio Image" loading="lazy">
                            <div class="portfolio-info">
                                <h4>Capturing Moments</h4>
                                <p>Photography</p>
                                <div class="portfolio-links">
                                    <a href="assets-website/img/portfolio/portfolio-portrait-1.webp" class="glightbox"
                                        title="Capturing Moments"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                        <div class="portfolio-wrap">
                            <img src="assets-website/img/portfolio/portfolio-2.webp" class="img-fluid" alt="Portfolio Image"
                                loading="lazy">
                            <div class="portfolio-info">
                                <h4>Woodcraft Design</h4>
                                <p>Web Design</p>
                                <div class="portfolio-links">
                                    <a href="assets-website/img/portfolio/portfolio-2.webp" class="glightbox"
                                        title="Woodcraft Design"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-automotive">
                        <div class="portfolio-wrap">
                            <img src="assets-website/img/portfolio/portfolio-portrait-2.webp" class="img-fluid"
                                alt="Portfolio Image" loading="lazy">
                            <div class="portfolio-info">
                                <h4>Classic Beauty</h4>
                                <p>Automotive</p>
                                <div class="portfolio-links">
                                    <a href="assets-website/img/portfolio/portfolio-portrait-2.webp" class="glightbox"
                                        title="Classic Beauty"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-nature">
                        <div class="portfolio-wrap">
                            <img src="assets-website/img/portfolio/portfolio-portrait-4.webp" class="img-fluid"
                                alt="Portfolio Image" loading="lazy">
                            <div class="portfolio-info">
                                <h4>Natural Growth</h4>
                                <p>Nature</p>
                                <div class="portfolio-links">
                                    <a href="assets-website/img/portfolio/portfolio-portrait-4.webp" class="glightbox"
                                        title="Natural Growth"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-photography">
                        <div class="portfolio-wrap">
                            <img src="assets-website/img/portfolio/portfolio-5.webp" class="img-fluid" alt="Portfolio Image"
                                loading="lazy">
                            <div class="portfolio-info">
                                <h4>Urban Stories</h4>
                                <p>Photography</p>
                                <div class="portfolio-links">
                                    <a href="assets-website/img/portfolio/portfolio-5.webp" class="glightbox"
                                        title="Urban Stories"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-design">
                        <div class="portfolio-wrap">
                            <img src="assets-website/img/portfolio/portfolio-6.webp" class="img-fluid"
                                alt="Portfolio Image" loading="lazy">
                            <div class="portfolio-info">
                                <h4>Digital Experience</h4>
                                <p>Web Design</p>
                                <div class="portfolio-links">
                                    <a href="assets-website/img/portfolio/portfolio-6.webp" class="glightbox"
                                        title="Digital Experience"><i class="bi bi-zoom-in"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->
@endsection
