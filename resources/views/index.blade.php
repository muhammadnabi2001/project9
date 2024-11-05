@extends('main')
@section('title')
@section('content')
<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background">
    <div class="container position-relative">
      <h1>Eng so'nggi yangiliklar</h1>
      <p>Welcome to our Website</p>
      <nav class="breadcrumbs">

      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Blog Posts Section -->
  <section id="blog-posts" class="blog-posts section">

    <div class="container">
      <div class="row gy-4">

        @foreach($posts as $post)
        <div class="col-lg-4">

          <article>

            <div class="post-img">
              <img src="{{ asset('img_uploaded/' . $post->img) }}" alt="" class="img-fluid">
            </div>

            <p class="post-category">{{$post->title}}</p>

            <h2 class="title">
              <a href="{{ route('batafsil', $post->id) }}">{{ $post->description }}</a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">{{$post->created_at}}</time>
                </p>
              </div>
            </div>
          </article>
        </div><!-- End post list item -->
        @endforeach
      </div>
    </div>

  </section><!-- /Blog Posts Section -->

  <!-- Blog Pagination Section -->
  <section id="blog-pagination" class="blog-pagination section">

    <div class="container">
      <div class="d-flex justify-content-center">
        <ul>
          {{ $posts->links() }}
        </ul>
      </div>
    </div>

  </section><!-- /Blog Pagination Section -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <main class="container mt-5">
    @foreach($savols as $savol)
    <div class="card mb-4">
      <div class="card-header">
        <h5 class="mb-0">{{ $savol->title }}</h5>
        @php
          $count = $savol->javobs->count();
        @endphp
        <h6>Umumiy ovozlar soni: {{ $count }}</h6>
      </div>
      <div class="card-body">
        <form action="votes" method="POST">
          @csrf
          <input type="hidden" name="savol_id" value="{{ $savol->id }}">
          @foreach($savol->variants as $variant)
          <div class="form-check">
            <input class="form-check-input" type="radio" name="variant_id" value="{{ $variant->id }}"
              id="variant{{ $variant->id }}">
            <label class="form-check-label" for="variant{{ $variant->id }}">
              {{ $variant->title }}
            </label>
           
            @php
              $percentage = $count > 0 ? ($variant->javobs->count() / $count) * 100 : 0;
            @endphp
            <span class="badge bg-secondary ms-2">{{ round($percentage, 2) }}%</span>
          </div>
          @endforeach
          <button type="submit" class="btn btn-primary mt-3">Ovoz berish</button>
        </form>

        @if(session('success') && session('savol_id') == $savol->id)
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @elseif(session('error') && session('savol_id') == $savol->id)
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif
      </div>
    </div>
    @endforeach
</main>


</main>
<footer id="footer" class="footer dark-background">
  <div class="container">
    <h3 class="sitename">Selecao</h3>
    <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
    <div class="social-links d-flex justify-content-center">
      <a href=""><i class="bi bi-twitter-x"></i></a>
      <a href=""><i class="bi bi-facebook"></i></a>
      <a href=""><i class="bi bi-instagram"></i></a>
      <a href=""><i class="bi bi-skype"></i></a>
      <a href=""><i class="bi bi-linkedin"></i></a>
    </div>
    <div class="container">
      <div class="copyright">
        <span>Copyright</span> <strong class="px-1 sitename">Selecao</strong> <span>All Rights Reserved</span>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </div>
</footer>

@endsection