<html>
  <head>
    <title>@yield('title')</title>
    <style>
      body {
        margin: unset;
        font-size:16px;
        color:#999;
      }

      .side {
        background-color: #f5f5fa;
        color: #090910;
        width: 320px;
        display: flex;
        flex-direction: column;
      }

      .side-head {
        display: flex;
        padding: 2em 4em;
      }
      .img-logomark {
        width: 3rem;
      }
      .img-logotype {
        margin-left: 1em;
      }

      .side-content {
        padding: 1em 2em;
      }
      .side-content ul {
        font-size:12px;
        padding-left: 2em;
        list-style-type: none;
      }
      .side-content ul li {
        padding: 10px 0px;
      }
      .side-content ul li h2 {
        margin: 0;
        font-size: 13px;
        margin-bottom: 10px;
        cursor: pointer;
      }
      .side-content ul li a{
        text-decoration: none;
        color: #090910;
      }

      .small-chapter-list {
        display: none;
      }
      .chapter-list-item.sub__on .small-chapter-list {
        display: block;
      }

      .footer {
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div style="display: flex;">
      <div class="side">
        <a class="side-head" href="#">
          <img class="img-logomark" src="{{ asset('/img/logomark.min.svg') }}">
          <img class="img-logotype" src="{{ asset('/img/logotype.min.svg') }}">
        </a>
        <div class="side-content">
          <ul class="chapter-list">
            @foreach ($terms as $term)
              <li class="chapter-list-item">
                <h2>{{$term['chapter']}}</h2>
                <ul class="small-chapter-list">
                  @foreach ($term['items'] as $item)
                    <li><a href="#">{{$item['name']}}</a></li>
                  @endforeach
                </ul>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="content">
        @yield('content')
      </div>
    </div>
    <div class="footer">
      <img src="{{ asset('/img/logomark.min.svg') }}">
    </div>
  </body>

  <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(function() {
      $('.chapter-list-item').on('click', function() {
        if ($(this).hasClass('sub__on')) {
          $(this).removeClass('sub__on');
        } else {
          $('.chapter-list-item').removeClass('sub__on')
          $(this).addClass('sub__on');
        }
      });
    });
  </script>
</html>
