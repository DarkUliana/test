<div class="main">
<strong>Теги:&emsp;</strong>
<?php
foreach($tags as $tag):

echo '<a href="/test/index.php/news/news_by_tag/'.$tag['tag_id'].'">'.$tag['tag_name'].'&emsp;</a>';
endforeach
?>
</div>