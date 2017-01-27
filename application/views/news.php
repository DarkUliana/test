<?php foreach ($news as $news_item): ?>

   <div class="main">
    <h2><?php echo $news_item['paper_head'] ?></h2>
    	<img src="/test/img/<?php echo $news_item['paper_image'] ?>" alt="img">
       <br>
        <?php echo $news_item['paper_short'] ?>

    <p><a href="page/<?php echo $news_item['paper_id'] ?>">Детальніше...</a></p>
	</div>
	
<?php endforeach ?>
<?php echo $this->pagination->create_links();?>