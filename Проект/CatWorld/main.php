<?php 
  include "path.php";
  include "app/controllers/posts.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/favicons/favicon-16x16.png">
  <link rel="manifest" href="assets/favicons/site.webmanifest">
  <link rel="mask-icon" href="assets/favicons/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="assets/CSS/normalize.css">
  <link rel="stylesheet" href="assets/CSS/style-menu.css">
  <link rel="stylesheet" href="assets/CSS/style-footer.css">
  <link rel="stylesheet" href="assets/CSS/style-main.css">
  <title>Главная</title>
</head>
<body>
  
  <header>
    <?php include("app/include/menu.php")?>
      <div class="conteiner">
        <div class="header-content_inner">
          <div class="header-img-content">
            <img class="header-buy" src="assets/img/main/БлокКупи.png">
            <div class="header-img">
              <img src="assets/img/main/Кот.png">
            </div>  
          </div>
          <div class="header-text">
            <div class="text-hight _anim-items">Найдите своего нового лучшего друга</div>
            <div class="text-small _anim-items">У нас Вы найдете котят таких пород, как: британская короткошерстная, мейн-кун, сиамская, персидская и многих других.</div>
            <div class="header-button-select">
              <button class="header-button  _anim-items">
                <a href="kittens.php">Смотреть котят</a>
              </button>
            </div>
          </div>
        </div>
      </div>    
  </header>

  <div class="breeds">
    <div class="title">Подберите лучшую для вас породу</div>
    <div class="conteiner">
      <div class="breeds-cats">
        <div class="breeds-cat-select">
          <div class="breeds-cat">
            <img class="cat-img" src="assets/img/main/breeds/Британская.png">
            <form class="breeds-select-form" action="breeds-select.php" method="POST">
              <input name="id_breed" type="hidden" value="6">
              <input type="submit" class="cat-text" value="Британская короткошерстная">
            </form>      
          </div> 
        </div>   
        <div class="breeds-cat-select">
          <div class="breeds-cat">
            <img class="cat-img" src="assets/img/main/breeds/Сиамская.png">
            <form class="breeds-select-form" action="breeds-select.php" method="POST">
              <input name="id_breed" type="hidden" value="17">
              <input type="submit" class="cat-text" value="Сиамская кошка">
            </form>          
          </div> 
        </div>
        <div class="breeds-cat-select">
          <div class="breeds-cat">
            <img class="cat-img" src="assets/img/main/breeds/Девон-рекс.png">
            <form class="breeds-select-form" action="breeds-select.php" method="POST">
              <input name="id_breed" type="hidden" value="8">
              <input type="submit" class="cat-text" value="Девон-рекс">
            </form>         
          </div> 
        </div>    
      </div>   
        <div class="view-all"> 
          <div class="view-all-select">
            <a href="breeds.php"> 
              <div class="view-all-content">
                <div class="view-text">Посмотреть все</div>   
                <img class="arrow-img" src="assets/img/main/breeds/Arrow.png"> 
              </div>
            </a>   
          </div>        
      </div>          
    </div>   
  </div>
  <div class="create-line-horizontal"></div>   


  
  <div class="statistic">  
    <div class="animated-content">
      <div class="animated-cat _anim-items">
        <img src="assets/img/main/Анимация.gif">
      </div>
    </div>
    <div class="conteiner">
      <div class="statistic-contents">  
        <div class="statistic-content">
          <div class="statistic-text-hight  _anim-items">10.000</div>
          <div class="statistic-text-small  _anim-items">Котят нашли своего любящего хозяина</div>   
        </div>     
        <div class="create-line-virtical"></div>   
        <div class="statistic-content">
          <div class="statistic-text-hight  _anim-items">200</div>
          <div class="statistic-text-small  _anim-items">Пород кошек сеществует и какая-то создана для тебя</div>       
        </div>
        <div class="create-line-virtical"></div> 
        <div class="statistic-content">
          <div class="statistic-text-hight  _anim-items">99.99%</div>
          <div class="statistic-text-small  _anim-items">Шанс что ты найдешь у нас котенка мечты</div>   
        </div>
      </div>
    </div>   
  </div>

  <div class="reviews">
    <div class="title">Отзывы</div>
    <div class="wrapper">
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="reviews-content">
              <div class="reviews-content-up">
                <div class="reviews-content-left">
                <div class="name-client">Елена Сидорова</div>
                <div class="reviews-date">18 июля 2023 г.</div>
                </div>
                <img class="reviews-decor" src="assets/img/main/reviews/Decoration.png">
              </div>
              <div class="reviews-content-down">
                <div class="reviews-text">Очень довольна покупкой котёнка на этом сайте! Приобрела котёнка породы бенгальская по имени Тигр. Сотрудники сайта были очень доброжелательны, ответили на все мои вопросы и помогли выбрать котёнка с учётом моих пожеланий. Тигр стал настоящим членом нашей семьи и приносит радость и уют в наш дом. Рекомендую этот сайт всем, кто хочет приобрести породистого котёнка!</div> 
                <img class="reviews-stars" src="assets/img/main/reviews/Stars.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="reviews-content">
              <div class="reviews-content-up">
                <div class="reviews-content-left">
                <div class="name-client">Максим Смирнов</div>
                <div class="reviews-date">23 июня 2023 г.</div>
                </div>
                <img class="reviews-decor" src="assets/img/main/reviews/Decoration.png">
              </div>
              <div class="reviews-content-down">
                <div class="reviews-text">Отличный сайт! Приобрел здесь котёнка породы шотландская вислоухая по имени Мурзик. Очень доволен качеством товара и обслуживанием. Сотрудники сайта были внимательны и отзывчивы, помогли мне выбрать котёнка с учётом моих предпочтений и бюджета. Мурзик уже стал моим лучшим другом и радует меня каждый день. Сайт рекомендую!</div> 
                <img class="reviews-stars" src="assets/img/main/reviews/Stars.png">
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="reviews-content">
              <div class="reviews-content-up">
                <div class="reviews-content-left">
                <div class="name-client">Мария Иванова</div>
                <div class="reviews-date">12 мая 2023 г.</div>
                </div>
                <img class="reviews-decor" src="assets/img/main/reviews/Decoration.png">
              </div>
              <div class="reviews-content-down">
                <div class="reviews-text">Я просто в восторге от сайта! Здесь нашла своего нового пушистого друга — котёнка породы мейн-кун по имени Барсик. Очень довольна выбором и сервисом. Сотрудники сайта были очень любезны, отвечали на все мои вопросы и помогли выбрать котёнка с учётом моих пожеланий. Барсик уже стал членом нашей семьи и приносит много радости и счастья.</div> 
                <img class="reviews-stars" src="assets/img/main/reviews/Stars.png">
              </div>
            </div>    
          </div>
          <div class="swiper-slide">
            <div class="reviews-content">
              <div class="reviews-content-up">
                <div class="reviews-content-left">
                <div class="name-client">Ольга Зайцева</div>
                <div class="reviews-date">09 апреля 2023 г.</div>
                </div>
                <img class="reviews-decor" src="assets/img/main/reviews/Decoration.png">
              </div>
              <div class="reviews-content-down">
                <div class="reviews-text">Невероятно довольна покупкой котёнка на этом сайте! Приобрела котёнка породы курильский бобтейл по имени Рыжик. Сотрудники сайта были очень внимательны и отзывчивы, помогли мне выбрать котёнка с учётом моих пожеланий и потребностей. Рыжик стал настоящим членом нашей семьи и приносит радость и уют в наш дом.</div> 
                <img class="reviews-stars" src="assets/img/main/reviews/Stars.png">
              </div>
            </div>    
          </div>  
      </div> 
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="assets/JS/script-reviews.js"></script>
  <script src="assets/JS/script-animation.js"></script>
  
  <?php include("app/include/footer.php")?>
</body>
</html>
