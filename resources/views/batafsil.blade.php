<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Blog Details - Selecao Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">


</head>

<body class="blog-details-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">

        <h1 class="sitename">Selecao</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          @foreach($categories as $category)
          <li><a href="{{ route('post.show', $category->id) }}">{{ $category->name }}</a></li>
          @endforeach
          <li><a href="/login">Login</a></li>
          <li><a href="/register">Register</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Blog Details</h1>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam
          molestias.</p>
        <nav class="breadcrumbs">

        </nav>
      </div>
    </div>

    <div class="container">
      <div class="row">

        <div class="col-lg-8">
          <section id="blog-details" class="blog-details section">
            <div class="container">
              <article class="article">
                <div class="post-img">
                  <img src="{{ asset('img_uploaded/' . $post->img) }}" alt="" class="img-fluid">
                </div>
                <h2 class="title">{{$post->title}}</h2>


                <div class="content">
                  <p>
                    {{$post->description}}
                  </p>

                  <p>
                    {{$post->text}}
                  </p>
                </div><!-- End post content -->
                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time
                          datetime="2020-01-01">{{$post->created_at}}</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                        href="blog-details.html">{{$post->comments->count()}} comments</a></li>
                    <li class="d-flex align-items-center">
                      <a href="{{ route('post.like', $post->id) }}" class="">
                        <i
                          class="bi bi-hand-thumbs-up{{ $post->likeOrDislike && $post->likeOrDislike ? '-fill' : '' }}">
                          {{ $post->likeCount ? $post->likeCount->count() : 0 }}
                        </i>
                      </a>
                    </li>

                    </li>
                    <li class="d-flex align-items-center">
                      <i class="bi bi-eye"></i>
                      <a href="#">{{ $post->view }} views</a>
                    </li>

                  </ul>
                </div><!-- End meta top -->

              </article>

            </div>
          </section><!-- /Blog Details Section -->
          <section id="blog-comments" class="blog-comments section">
          </section><!-- /Blog Comments Section -->
          <section id="comment-form" class="comment-form section">
            <div class="container">
              <form action="{{route('post.comments',$post->id)}}">
                @csrf
                <h4>Post Comment</h4>
                <div class="row">
                  <div class="col form-group">
                    <textarea class="form-control" placeholder="Your Comment*" name="body"></textarea>
                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Post Comment</button>
                </div>

              </form>

            </div>
          </section><!-- /Comment Form Section -->
        </div>
        <div class="col-lg-4 sidebar">
          <div class="widgets-container">

            <h3 class="widget-title">Comments</h3>
            <ul class="mt-3">
              <ul>
                @foreach($post->comments as $comment)
                <li>
                  <strong>{{ $comment->user->name }} <br></strong>
                  <a href="#">{{ $comment->body }}</a>
                </li>
                @endforeach
              </ul>

            </ul>

          </div>
          <!--/Categories Widget -->
        </div>
      </div>

    </div>
    </div>

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

          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>