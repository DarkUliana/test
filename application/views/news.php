<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['paper_head'] ?></h2>
    <div id="main">
        <?php echo $news_item['paper_short'] ?>
    </div>
    <p><a href="news/<?php echo $news_item['paper_id'] ?>">Детальніше...</a></p>

<?php endforeach ?>