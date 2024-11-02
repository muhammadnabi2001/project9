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
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <article>
                        <div class="post-img">
                            <img src="{{ asset('img_uploaded/' . $post->img) }}" alt="{{ $post->title }}" class="img-fluid" style="width: 100%; height: auto;">
                        </div>
                        
                        <h2 class="title">{{ $post->title }}</h2>
                        <p class="post-description">{{ $post->description }}</p>
                        <div class="post-text">
                            <p>{{ $post->text }}</p>
                        </div>
                        <p class="post-date">
                            <time datetime="{{ $post->created_at }}">{{ $post->created_at->format('F j, Y') }}</time>
                        </p>
                    </article>
                </div>
            </div>
        </div>
    </section><!-- /Blog Posts Section -->
    

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section">

      <div class="container">
        <div class="d-flex justify-content-center">
          <ul>
            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#" class="active">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li>...</li>
            <li><a href="#">10</a></li>
            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>

    </section><!-- /Blog Pagination Section -->

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