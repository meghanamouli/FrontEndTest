<?php 
	echo '<div class="col-md-3">';
	echo '<div class="image_structure">';
	echo ''.base64_encode($row['imageName']). '</br>';	
	echo '<div class="title">
			<p class="inline">'.$row['title'].'</p>
			<p class="inline"> by </p>
			<p class="inline right"> '.$row['auther_name'].'</p>
		  </div>';
	echo '<p class="desc">Description: '.$row['imageDesc'].'</p>';
	echo '<p class="tags">Tags'.$row['imageTags'].'</p>';
	echo '</div>';
	echo '</div>';	
?>