@extends('website.layout')

@section('content')
    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pricing</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center g-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="pricing-card starter">
                        <div class="plan-header">
                            <h3 class="plan-name">Starter</h3>
                            <p class="plan-description">Perfect for individuals and small projects getting
                                started.</p>
                        </div>
                        <div class="pricing-display">
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">19</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="features-list">
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>5 Projects</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>10GB Storage</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Email Support</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Basic Analytics</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>SSL Certificate</span>
                            </div>
                        </div>
                        <a href="#" class="btn-plan">Get Started</a>
                    </div>
                </div><!-- End Starter Plan -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="pricing-card professional featured">
                        <div class="plan-header">
                            <div class="featured-badge">Most Popular</div>
                            <h3 class="plan-name">Professional</h3>
                            <p class="plan-description">Ideal for growing businesses and teams that need more
                                power.</p>
                        </div>
                        <div class="pricing-display">
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">49</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="features-list">
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>25 Projects</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>100GB Storage</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Priority Support</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Advanced Analytics</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Team Collaboration</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Custom Integrations</span>
                            </div>
                        </div>
                        <a href="#" class="btn-plan">Start Free Trial</a>
                    </div>
                </div><!-- End Professional Plan -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="pricing-card enterprise">
                        <div class="plan-header">
                            <h3 class="plan-name">Enterprise</h3>
                            <p class="plan-description">Comprehensive solution for large organizations with
                                specific needs.</p>
                        </div>
                        <div class="pricing-display">
                            <div class="price">
                                <span class="currency">$</span>
                                <span class="amount">99</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="features-list">
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Unlimited Projects</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>1TB Storage</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>24/7 Phone Support</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Enterprise Analytics</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Advanced Security</span>
                            </div>
                            <div class="feature">
                                <i class="bi bi-check2"></i>
                                <span>Dedicated Account Manager</span>
                            </div>
                        </div>
                        <a href="#" class="btn-plan">Contact Sales</a>
                    </div>
                </div><!-- End Enterprise Plan -->

            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="600">
                    <div class="pricing-footer">
                        <p class="guarantee-text">30-day money-back guarantee • No setup fees • Cancel anytime</p>
                        <p class="contact-text">Need a custom plan? <a href="#">Contact our sales team</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Pricing Section -->
@endsection
