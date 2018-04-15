<!-- START header -->
<?php if(!isset($element['helper']['menu'])){$element['helper']['menu']='';} ?>
<header class="header">
  <a class="<?php if($element['helper']['menu']=='index'){echo 'active';} ?>" href="/">Strona główna</a>
  <a class="<?php if($element['helper']['menu']=='about'){echo 'active';} ?>" href="/sites/about">O nas</a>
  <a class="<?php if($element['helper']['menu']=='news'){echo 'active';} ?>" href="/sites/news">Wiadomości</a>
  <a class="<?php if($element['helper']['menu']=='contact'){echo 'active';} ?>" href="/sites/contact">Kontakt</a>
</header>
<!-- END header -->
