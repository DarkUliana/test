<?php foreach ($news as $news_item): ?>

   <a href="/test/index.php/news/page/<?php echo $news_item['paper_id'] ?>" class="main">
    <h2><?php echo $news_item['paper_head'] ?></h2>
    	<img src="/test/img/<?php echo $news_item['paper_image'] ?>" alt="img">
       <br>
        <?php echo $news_item['paper_short'] ?>

    </a>

	
<?php endforeach ?>
