<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			<?php
			$song_count = 5678;
			$number_of_hours_of_music = ((int)$song_count/10);
			print "I love music.";
			print "I have $song_count total songs,";
			print "which is over $number_of_hours_of_music hours of music!"
			?>
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

			<ol>
			<?php				
				$newspages = 6;
				if (isset($_GET["newspages"])) {
					$newspages = 11-$_GET["newspages"];
				}
				for ($news_pages = 11; $news_pages >$newspages; $news_pages--){ 
					if ($news_pages<10){
						$news_pages = "0"."$news_pages";
					}?>
					<li><a href="https://www.billboard.com/archive/article/2019<?php print $news_pages ?>">2019-<?php print $news_pages ?></li>
				<?php $news_pages = (int)$news_pages;} ?>
				</a>
			</ol>
		</div>
		
		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			
			<ol>
				<?php
					$favorite_artists = array("Guns N' Roses", "Green Day", "Blink182", "Queen");
					foreach (file("favorite.txt")/*$favorite_artists*/ as $artists){
				?>
				<li><a href="https://en.wikipedia.org/wiki/<?php print $artists ?>"><?php print $artists ?></a></li>
				<?php } ?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
			<?php
				$song_list = glob("lab5/musicPHP/songs/*.mp3");
				foreach($song_list as $mp3){
				?>

				<li class="mp3item">
					<a href=<?php print $mp3 ?>><?= basename($mp3)?> </a><span>(<?=(int) (filesize($mp3)/1024)?>KB)</span>
				</li>
				
				<?php } ?>
				
				<!-- Exercise 8: Playlists (Files) -->
				<?php
					$playlist_m3u = glob("lab5/musicPHP/songs/*.m3u");
					foreach($playlist_m3u as $playlist) { ?>
						<li class="playlistitem"><?=basename($playlist)?>:
						<?php 
						$files = file($playlist);
						foreach ($files as $file){?>
							<ul>
								<?php
								$pos = stripos($file,"#");
								if ($pos !== 0){ ?>
								<li><?= $file ?> <?=stripos($file, "#")?></li>
								<?php } ?>
							
							</ul>
						<?php } ?>
					<?php } ?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>