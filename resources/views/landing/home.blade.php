@extends('layouts.landing')
@section('content')
<style>
    img{
        object-fit: cover;
        object-position: center;
        max-width: 100%;
        height: 350px;
    }
</style>
<!-- ======= Team Section ======= -->
<section id="team" class="section-bg">
    <div class="container " data-aos="fade-up">
        <header class="section-header">
            <h3 class="section-title">Conferencistas</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida nibh et rutrum fringilla. Donec vitae efficitur urna. Cras risus metus, interdum quis pharetra eu, gravida ac dui.</p>
        </header>
        <div class="row portfolio-container  d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            @foreach($speakerImg as $key => $value)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="member" data-aos="fade-up" >
                    <img src="{{ url('storage/'.$value->url) }}" alt="">
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
                        <img src="{{ url('storage/'.$value->url) }}">
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
<section id="contact">
    <div class="container " data-aos="fade-up">
        <header class="section-header">
            <h3 class="section-title">Aliados</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam gravida nibh et rutrum fringilla. Donec vitae efficitur urna. Cras risus metus, interdum quis pharetra eu, gravida ac dui.</p>
        </header>
        <div class="row portfolio-container  d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
            @foreach($allyImg as $key => $value)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="member" data-aos="fade-up">
                    <img src="{{ url('storage/'.$value->url) }}" alt="">
                    <div class="member-info">
                        <div class="member-info-content">
                            <h4>{{$value->name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Contact Section -->
</main>
<!-- End #main -->
@endsection
