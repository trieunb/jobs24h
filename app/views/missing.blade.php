
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>404 - Shipwrecked</title>
    <meta name="author" content="bernX" />
    <meta name="keywords" content="404, css3, html5, template" />
    <meta name="description" content="Shipwrecked - Page Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Bootstrap CSS -->
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/404.css') }}
    {{ HTML::style('assets/404-responsive.css') }}
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,800italic,800,700italic,700,600italic,600,400italic,300' rel='stylesheet' type='text/css' />
    <!-- Favicon -->
  </head>

  <body>
    <!-- Header -->
    <section>
      <div class="container">
        <div class="row">
          <div>
            <h1>404</h1>
            <h2>Page not found</h2>
            <p>Trang này đang được xây dựng, vui lòng trở lại sau</p>
          </div>
        </div>
      </div>
    </section>
    <!-- end Header -->

   

    <!-- Button -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a href="{{ URL::previous() }}"><div class="btn btn-action">Bấn vào đây để trở lại</div></a>
          </div>
        </div>
      </div>
    </section>
    <!-- end Button -->

    <!-- Footer -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <p>Copyright (c) 2015 <a href="{{ URL::to('/') }}">vnjobs.vn</a>. All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- end Footer -->

  </body>

</html>
