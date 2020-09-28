@extends('layouts.landing')
@section('content')
<!-- ======= Team Section ======= -->
<section id="team">
    <div class="container " data-aos="fade-up">
        <header class="section-header">
            <h3 class="section-title">Conferencistas</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida nibh et rutrum fringilla. Donec vitae efficitur urna. Cras risus metus, interdum quis pharetra eu, gravida ac dui.</p>
        </header>
        <div class="row  d-flex justify-content-center">
            @foreach($speakerImg as $key => $value)
            <div class="col-lg-3 col-md-6">
                <div class="member" data-aos="fade-up">
                    <img src="{{ url('storage/'.$value->url) }}" class="img-fluid" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{{$value->name}}</h4>
                            <span>{{$value->name_detail}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Team Section -->
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="section-bg">
    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3 class="section-title">Cronograma</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida nibh et rutrum fringilla. Donec vitae efficitur urna. Cras risus metus, interdum quis pharetra eu, gravida ac dui.</p>
        </header>
        <div class="row portfolio-container  d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            @foreach ($calendarImg as $key => $value)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <figure>
                        <img src="{{ url('storage/'.$value->url) }}" class="img-fluid" alt="">
                        <a href="{{ url('storage/'.$value->url) }}" data-lightbox="portfolio" data-title="App 1" class="link-preview venobox"><i class="far fa-eye"></i></a>
                        <a href="{{ route('calendar.download',$value->id) }}" class="link-details" title="More Details"><i class="fas fa-cloud-download-alt"></i></a>
                    </figure>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Portfolio Section -->
<!-- ======= Contact Section ======= -->
<section id="contact" class="section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-header">
            <h3>Contacto</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida nibh et rutrum fringilla. Donec vitae efficitur urna. Cras risus metus, interdum quis pharetra eu, gravida ac dui.</p>
        </div>
        <div class="row contact-info">
            <div class="col-md-4">
                <div class="contact-address">
                    <i class="ion-ios-location-outline"></i>
                    <h3>Direcci&oacute;n</h3>
                    <address>A108 Adam Street, NY 535022, USA</address>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-phone">
                    <i class="ion-ios-telephone-outline"></i>
                    <h3>Tel&eacute;fono</h3>
                    <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact-email">
                    <i class="ion-ios-email-outline"></i>
                    <h3>Correo</h3>
                    <p><a href="mailto:info@example.com">info@example.com</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->
</main>
<!-- End #main -->
@endsection