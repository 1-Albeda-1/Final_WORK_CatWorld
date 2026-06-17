<?php if(count($errMsg) > 0) : ?>
  <?php foreach($errMsg as $error): ?>
    <div><?=$error; ?></div>
  <?php endforeach; ?>
<?php endif; ?>