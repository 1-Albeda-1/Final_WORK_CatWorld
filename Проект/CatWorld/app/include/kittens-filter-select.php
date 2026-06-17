<form action="kittens-filter.php" method="GET">
  <div class="filter-content">
    <div class="filter-title">Порода</div>
    <select class="filter-list" name="breed_id">
      <option class="filter-item" value="all" disabled selected>Все</option>
      <?php foreach ($breeds as $key => $breed): ?>
        <option class="filter-item" value="<?=$breed['id_breed']?>"><?=$breed['breed_title']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="filter-content">
    <div class="filter-title">Пол</div>
      <select class="filter-list" name="gender_id">
        <option class="filter-item" value="all" disabled selected>Все</option>
        <?php foreach ($genders as $key => $gender): ?>
          <option class="filter-item" value="<?=$gender['id_gender']; ?>"><?=$gender['gender_title']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
  <div class="filter-content">
  <div class="filter-title">Окрас</div>
    <select class="filter-list" name="color_id">
      <option class="filter-item" value="all" disabled selected>Все</option>
      <?php foreach ($colors as $key => $color): ?>
        <option class="filter-item" value="<?=$color['id_color']; ?>"><?=$color['color_title']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>     
  <div class="filter-content">
    <div class="filter-title">Возраст</div>
    <select class="filter-list" name="age_id">
      <option class="filter-item" value="all" disabled selected>Все</option>
      <?php foreach ($ages as $key => $age): ?>
        <option class="filter-item" value="<?=$age['id_age']; ?>"><?=$age['age_title']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <input class="filter-button" type="submit" value="Отфильтровать">
</form>