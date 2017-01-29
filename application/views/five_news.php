<script type="text/javascript">
	$.post('/test/index.php/news/five', 
		   {'id':<?php echo $news['paper_id']?>},
		  function(result)
		  {
			 var val = JSON.parse(result);
			 for(var i=0; i<val.five.length; ++i)
			  {
				  $('#five').append('<a class="one" href="/test/index.php/news/page/'+val.five[i].paper_id+'">'+val.five[i].paper_head+'<br><img src="/test/img/'+val.five[i].paper_image+'"></a>');

			  }		
	})
</script>