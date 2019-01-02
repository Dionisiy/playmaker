<?php
$args = [
  'child_of' => 0,
    'parent' => 0,
];
$arg = [
    'child_of' => 0,
    'parent' => 0,
];
$footer_news = get_categories($args);
$footer_reviews = get_categories($arg);

?>

      <div class="footer-widget">
          <div class="container">
              <div class="footer-advertising-area">
                  <div class="widget widget_text">
                      <div class="textwidget">
                          <div class="ads-banner">
                              <div class="bottom_banner">
                                  <a href="#" alt="Footer Banner" data-pagespeed-url-hash="1580016897" >
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="footer-icons">
                  <div class="followus">
                      <a title="" href="Facebook URL" data-original-title="Facebook" data-placement="top" class="colrhover" target="_blank">
                          <i class="fa fa-facebook-square icon"></i>
                      </a>
                      <a title="" href="Telegram URL" data-original-title="Telegram" data-placement="top" class="colrhover" target="_blank">
                          <i class="fa fa-paper-plane" aria-hidden="true"></i>
                      </a>
                      <a title="" href="Instagram URL" data-original-title="Instagram" data-placement="top" class="colrhover" target="_blank">
                          <i class="fa fa-instagram icon"></i>
                      </a>
                  </div>
              </div>
          </div>
          <!-- Container Start -->
          <div class="container widget_wrapper">
              <!-- Footer Widgets Start -->
              <div class="widget widget_recent_entries">
                  <header class="px-heading-title">
                      <h2 class="px-section-title">Новости</h2>
                  </header>
                  <ul>
                      <li>
                          <a href="/news/england">Новости АПЛ</a>
                      </li>
                      <li>
                          <a href="/news/germany">Новости Бундеслиги</a>
                      </li>
                      <li>
                          <a href="/news/spain">Новости Ла Лиги</a>
                      </li>
                      <li>
                          <a href="/news/france">Новости Лиги 1</a>
                      </li>
                      <li>
                          <a href="/news/italy">Новости Серии А</a>
                      </li>
                      <li>
                          <a href="/news/national">Сборные</a>
                      </li>
                      <li>
                          <a href="/news/champions-league">Лига Чемпионов</a>
                      </li>
                      <li>
                          <a href="/news/europe-league">Лига Европы</a>
                      </li>
                  </ul>
              </div>
              <div class="widget widget_categories">
                  <header class="px-heading-title">
                      <h2 class="px-section-title">Обзоры</h2>
                  </header>
                  <ul>
                      <li>
                          <a href="/reviews/england">Обзоры АПЛ</a>
                      </li>
                       <li>
                          <a href="/reviews/germany">Обзоры Бундеслиги</a>
                      </li>
                       <li>
                          <a href="/reviews/spain">Обзоры Ла Лиги</a>
                      </li>
                      <li>
                          <a href="/reviews/france">Обзоры Лиги 1</a>
                      </li>
                      <li>
                          <a href="/reviews/italy">Обзоры Серии А</a>
                      </li>
                      <li>
                          <a href="/reviews/national">Сборные</a>
                      </li>
                      <li>
                          <a href="/reviews/champions-league">Лига Чемпионов</a>
                      </li>
                      <li>
                          <a href="/reviews/europe-league">Лига Европы</a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="copyright">
              <span class="px-section-title">&copy; PLAYMAKER 2019</span>
              <div class="textwidget hidden">
                  <div class="home-info">
                      <a href="#" class="pix-bgcolr">Карта сайта <i class="fa fa-arrow-right"></i></a>
                  </div>
              </div>
          </div>
         <!-- Container End -->
      </div>
    </div>  <!--innermain-->
</div> <!--main-->
<!--    <script async src="/wp-content/themes/sporttheme/js/cycle2.js"></script>-->

<script async src="/wp-content/themes/playmaker/main.js"></script>
<script async src="/wp-content/themes/playmaker/js/carousel.js"></script>
<script type="text/javascript">

//    $(function() {
//        let keyID = '7c59dfd7f4a44181a6691c5baca090a8';
//        let roundid = 331;
//        $.ajax({
//            url: "https://api.fantasydata.net/v3/soccer/scores/json/Standings/" + roundid,
//            beforeSend: function(xhrObj){
//                // Request headers
//                xhrObj.setRequestHeader("Content-Type","application/json");
////                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key",keyID);
//                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key",keyID);
//            },
//            type: "GET",
//            // Request body
//            data: "",
//        })
//            .done(function(data) {
//                // alert("success");
//            })
//            .fail(function() {
//                alert("error");
//            });
//
//    });
//    function goBack() { window.history.back()
//    }



</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/wp-content/themes/playmaker/js/new.js"></script>
<script src="/wp-content/themes/playmaker/js/cycle2.js"></script>

<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

<script type="text/javascript">
    $('.btnsearch').on('click', function(){
        $('#searcharea').toggle(500);
    });

    $('.table_slick').slick({
        rtl: true
    });
</script>
          <script type="text/javascript">

              $(document).ready(function(){
                  $('.slick_slider').slick({
                      dots: false,
                      arrows: false,
                      autoplay:true,
                      autoplaySpeed: 10000,
                      infinite: true,
                      speed: 500,
                      fade: true,
                      cssEase: 'linear'
                  });
              });
              $('.cs-click-menu').on('click', function() {
                  $(this).toggleClass('active');
              });

    </script>

  <?php wp_footer(); ?>

</body>
</html>