<header>
    <h2>Все новости категории: <?=$category['title']?></h2>
</header>

<?php foreach($allNews as $news): ?>
    <h4><a href="<?=route('news/showNews', ['id' => $news['id']])?>"><?=$news['title']?></a></h4>
    <p><?=$news['description']?></p>
    <hr>
 <?php endforeach; ?>

 <footer>
    footer
</footer>