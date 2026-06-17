<?php 
  $hidden = true;
  if($page > 1){
    $hidden = false;
  } else {
    $hidden = true;
  }
?>
<nav class="pagination">
  <ul class="pagination-content">
    <div class="pagination-button-select">
      <?php if($hidden): ?>
        <button class="button-unvisible-pagination"></button>
      <?php endif; ?>
      <?php if($page > 1): ?>
        <li class="pagination-button button-previous">
          <a class="pagination-text" href="?page=<?=$page - 1; ?>">Предыдущая</a>
        </li>
      <?php endif; ?>
    </div>
    <?php if($total_pages > 1): ?>
      <div class="pagination-number"><?=$page;?>/<?=$total_pages;?></div>
    <?php endif; ?>
    <div class="pagination-button-select">
      <?php if($page < $total_pages): ?>
        <li class="pagination-button button-next">
          <a class="pagination-text" href="?page=<?=$page + 1; ?>">Следующая</a>
        </li>
      <?php endif; ?>
    </div>
  </ul>
</nav>