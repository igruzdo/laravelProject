<header>
    <h2>Добро пожаловать в агрегатор новостей!</h2>
    <p>Здесь вы найдете самые свежие новости мира. Выберите интересующую вас категорию:</p>
</header>

<?php foreach($categories as $category): ?>
    <div>
        <h4>
            <a href="<?=route('/all_news/showCategoryNews', ['category' => $category['title']])?>"><?=$category['title']?></a>
        </h4>
    </div>
    <hr>
<?php endforeach; ?>

<footer>
    <p>footer</p>
</footer>