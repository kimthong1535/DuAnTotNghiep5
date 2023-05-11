e@extends('frontend.master')
@section('content')

<div class="contact">
  <div class="container">
    <div class="row">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset ('frontend/images/1.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset ('frontend/images/2.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset ('frontend/images/3.jpg') }}" alt="Third slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{ asset ('frontend/images/4.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control" href="#carouselExampleControls" role="button" data-slide="prev">
          <i class="fal fa-chevron-right"></i>
        </a>
        <a class="carousel-control" href="#carouselExampleControls" role="button" data-slide="next">
          <i class="fal fa-chevron-left"></i>
        </a>
      </div>
    </div>
  </div>

  <div class="container p-0 pb-md-3 ">
    <div class="row">
      @foreach ($post as $value )
      <a href="{{ url ('/post-detail/'.$value->post_id) }}">
        <div class="col-md-4 mt-4">
          <div class="card">
            <img class="card-img-top" src="{{ asset ('Backend/uploads/posts/'.$value->post_images) }}"
                 alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $value->post_title }}</h5>
              <div class=" d-flex bd-highlight">

                <div class=" hf p-2 flex-fill bd-highlight">{{ $value->created_at->toDateString() }}</div>
                <div class=" hr p-2 flex-fill bd-highlight pl-0"><a href="{{ url ('/post-detail/'.$value->post_id) }}"
                     class="btn btn-primary">Xem chi tiết</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>

  <div class="container">
    <div class="row">
      <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </div>
  </div>
</div>

@endsection