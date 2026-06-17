<footer>
  <div class="conteiner">
    <div class="footer-contents-up">  
      <div class="footer-logo" alt="" onclick="window.location.href='<?php echo BASE_URL . 'main.php'; ?>'"></div> 
      <nav class="footer-menu">
        <li><a href="kittens.php">Наши котята</a></li>
        <li><a href="breeds.php">Породы кошек</a></li>
        <li><a href="contact.php">Контакты</a></li>
      </nav>      
    </div>    
  </div>
  <div class="horizontal-line-hidden">
    <div class="create-line-horizontal-footer"></div>
  </div> 
  <div class="conteiner">
      <div class="footer-contents-down">  
        <div class="footer-text">© 2024 СAT WORLD Все права защищены.</div>
        <button id="button_authorization" class="button-unvisible"></button>
        <div class="socials">
          <a href="#">
            <img class="social-img" src="assets/img/telegram.png">
          </a>
          <a href="#">
            <img class="social-img" src="assets/img/vkontakte.png">
          </a>
          <a href="#">
            <img class="social-img" src="assets/img/whatsapp.png">
          </a>
        </div>    
      </div>
    </div>
</footer>

<script>
  var count = 0;
  const button = document.getElementById("button_authorization");
  button.onclick = function(){
  count++;
  if(count == 3){
    alert('Переход на страницу авторизации администраторов');
    window.location.href = "<?php echo BASE_URL . 'authorization.php'; ?>";
  }	
};
</script>