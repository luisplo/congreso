@extends('layouts.admin')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Conferencistas</h1>
</div>
<!-- Approach -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Agregar Imagen</h6>
    </div>
    <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lectus dolor, ultrices a nunc id, hendrerit lobortis ex. Donec iaculis accumsan porttitor. Vivamus metus nulla.</p>

        <form action="/speaker/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Pepe Perez">
                @error('name')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="name_detail">Detalle</label>
                <input id="name_detail" name="name_detail" type="text" class="form-control" placeholder="Developer">
                @error('name_detail')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <input id="image" name="image" type="file" class="form-control" placeholder="Developer">
                @error('image')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="section-bg">
            <div class="container" data-aos="fade-up">
                <div class="row portfolio-container  d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($imgSpeaker as $img)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <figure>
                                <img src="{{ url('storage/'.$img->url) }}" class="img-fluid" alt="">
                                <a href="{{ url('storage/'.$img->url) }}" data-lightbox="portfolio" data-title="App 1" class="link-preview venobox"><i class="far fa-eye"></i></a>
                                <a href="portfolio-details.html" class="link-details" title="More Details"><i class="far fa-trash-alt"></i></a>
                            </figure>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Portfolio Section -->
    </div>
</div>
@endsection