@extends('website.layout')


@section('content')
    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Check Our Services</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Services Grid -->
            <div class="row gy-5">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card">
                        <div class="service-number">01</div>
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <i class="bi bi-laptop"></i>
                            </div>
                        </div>
                        <div class="service-content">
                            <h4>UI/UX Design</h4>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium totam rem aperiam eaque ipsa.</p>
                            <ul class="service-list">
                                <li>User Research</li>
                                <li>Wireframing</li>
                                <li>Prototyping</li>
                                <li>Visual Design</li>
                            </ul>
                            <div class="service-pricing">
                                <span class="price-tag">$1,299</span>
                                <a href="#" class="service-btn">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card featured">
                        <div class="service-number">02</div>
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <i class="bi bi-globe"></i>
                            </div>
                        </div>
                        <div class="service-content">
                            <h4>Web Development</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti.</p>
                            <ul class="service-list">
                                <li>Frontend Development</li>
                                <li>Backend Solutions</li>
                                <li>CMS Integration</li>
                                <li>Performance Optimization</li>
                            </ul>
                            <div class="service-pricing">
                                <span class="price-tag">$2,499</span>
                                <a href="#" class="service-btn">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card">
                        <div class="service-number">03</div>
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                        <div class="service-content">
                            <h4>Mobile Applications</h4>
                            <p>Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt
                                mollit anim id est laborum sed ut.</p>
                            <ul class="service-list">
                                <li>iOS Development</li>
                                <li>Android Development</li>
                                <li>Cross-platform Apps</li>
                                <li>App Store Deployment</li>
                            </ul>
                            <div class="service-pricing">
                                <span class="price-tag">$3,799</span>
                                <a href="#" class="service-btn">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-card">
                        <div class="service-number">04</div>
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <i class="bi bi-search"></i>
                            </div>
                        </div>
                        <div class="service-content">
                            <h4>SEO Optimization</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua ut enim.</p>
                            <ul class="service-list">
                                <li>Keyword Research</li>
                                <li>On-page SEO</li>
                                <li>Technical SEO</li>
                                <li>Link Building</li>
                            </ul>
                            <div class="service-pricing">
                                <span class="price-tag">$899</span>
                                <a href="#" class="service-btn">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-card">
                        <div class="service-number">05</div>
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="service-content">
                            <h4>Cybersecurity</h4>
                            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                fugiat nulla pariatur excepteur sint occaecat.</p>
                            <ul class="service-list">
                                <li>Security Audits</li>
                                <li>Penetration Testing</li>
                                <li>Data Protection</li>
                                <li>Compliance Consulting</li>
                            </ul>
                            <div class="service-pricing">
                                <span class="price-tag">$1,999</span>
                                <a href="#" class="service-btn">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-card">
                        <div class="service-number">06</div>
                        <div class="service-icon-wrapper">
                            <div class="service-icon">
                                <i class="bi bi-cloud-arrow-up"></i>
                            </div>
                        </div>
                        <div class="service-content">
                            <h4>Cloud Solutions</h4>
                            <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat
                                duis aute irure dolor in reprehenderit in voluptate.</p>
                            <ul class="service-list">
                                <li>Cloud Migration</li>
                                <li>Infrastructure Setup</li>
                                <li>DevOps Services</li>
                                <li>Monitoring &amp; Support</li>
                            </ul>
                            <div class="service-pricing">
                                <span class="price-tag">$1,599</span>
                                <a href="#" class="service-btn">
                                    <span>Learn More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Services Section -->
@endsection
