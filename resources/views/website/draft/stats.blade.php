@extends('website.layout')

@section('content')
    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="stats-board">
                        <article class="stat-tile" data-aos="fade-up" data-aos-delay="150">
                            <div class="tile-head">
                                <i class="bi bi-emoji-smile"></i>
                                <div class="label">
                                    <h6 class="title">Client Satisfaction</h6>
                                    <small class="hint">Lorem ipsum dolor sit amet</small>
                                </div>
                            </div>
                            <div class="tile-metric">
                                <span class="metric-number purecounter" data-purecounter-start="0"
                                    data-purecounter-end="232" data-purecounter-duration="1"></span>
                                <span class="metric-suffix">+</span>
                            </div>
                        </article><!-- End Stat Tile -->

                        <article class="stat-tile" data-aos="fade-up" data-aos-delay="200">
                            <div class="tile-head">
                                <i class="bi bi-journal-richtext"></i>
                                <div class="label">
                                    <h6 class="title">Delivered Projects</h6>
                                    <small class="hint">Consectetur adipiscing elit</small>
                                </div>
                            </div>
                            <div class="tile-metric">
                                <span class="metric-number purecounter" data-purecounter-start="0"
                                    data-purecounter-end="521" data-purecounter-duration="1"></span>
                                <span class="metric-suffix">+</span>
                            </div>
                        </article><!-- End Stat Tile -->

                        <article class="stat-tile" data-aos="fade-up" data-aos-delay="250">
                            <div class="tile-head">
                                <i class="bi bi-headset"></i>
                                <div class="label">
                                    <h6 class="title">Support Hours</h6>
                                    <small class="hint">Sed do eiusmod tempor</small>
                                </div>
                            </div>
                            <div class="tile-metric">
                                <span class="metric-number purecounter" data-purecounter-start="0"
                                    data-purecounter-end="1463" data-purecounter-duration="1"></span>
                            </div>
                        </article><!-- End Stat Tile -->

                        <article class="stat-tile" data-aos="fade-up" data-aos-delay="300">
                            <div class="tile-head">
                                <i class="bi bi-people"></i>
                                <div class="label">
                                    <h6 class="title">Team Members</h6>
                                    <small class="hint">Ut enim ad minim veniam</small>
                                </div>
                            </div>
                            <div class="tile-metric">
                                <span class="metric-number purecounter" data-purecounter-start="0" data-purecounter-end="15"
                                    data-purecounter-duration="1"></span>
                            </div>
                        </article><!-- End Stat Tile -->
                    </div>

                    <div class="legend-row" data-aos="fade-down" data-aos-delay="350">
                        <div class="legend-item">
                            <span class="dot dot-primary"></span>
                            <span class="text">Data updated quarterly</span>
                        </div>
                        <div class="legend-item">
                            <span class="dot dot-neutral"></span>
                            <span class="text">Benchmarked against industry</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Stats Section -->
@endsection
