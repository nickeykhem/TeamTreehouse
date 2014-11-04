<?php 
// Place your own unique token here
// ie. itpc://teamtreehouse.com/library/websites/build-a-simple-website.rss?feed_token=xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx 
// $token = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';
$token = 'c21bcec5-cd4c-4cc1-8ffa-2b5e2f3a12d7';

// Place any itunes feeds here
// This is an almost complete list... I left off some beginner lessons
// This might compile depending on server... You can split this array up

//*NOTE THIS ONLY WORKS FOR COURSES WITH MORE THEN ONE VIDEO so it doesn't include
//Use the below array items as follows
//'itpc://teamtreehouse.com/library/COURSE_TITLE_AS_ON_TREEHOUSE.rss?feed_token='.$token,
$urls = array(
   // 'itpc://teamtreehouse.com/library/media-queries.rss?feed_token='.$token,
   // 'itpc://teamtreehouse.com/library/treehouse-friends.rss?feed_token='.$token,
   // 'itpc://teamtreehouse.com/library/future-insights-live-2014.rss?feed_token='.$token,
   // 'itpc://teamtreehouse.com/library/using-php-with-mysql.rss?feed_token='.$token,
   'itpc://teamtreehouse.com/library/how-to-market-your-business.rss?feed_token='.$token,
);

foreach ($urls as $url):
    $numb = 0;
    $url = str_replace("itpc://","http://",$url);
    $xml = simplexml_load_file($url);

    echo '<h2>'.$xml->channel[0]->title.'</h2>';
    //echo '<ol>'
    foreach ($xml->channel->item as $pixinfo):
    	$numb++;
        $title=$pixinfo->title;
        $link=$pixinfo->enclosure['url'];
        // In chrome the HTML5 download attribute will auto download, no right clicking necessary
        // Hold Alt plus Click will autodownload
        echo $numb. ' '.'<a href="'.$link.'">'. $title .'</a><br>';
        //echo $numb. ' '.'<a href="'.$link.'" download>'. $title .'</a><br>'; THIS VERSION INITATES download onclick for chrome only!
        //echo '</li>'
    endforeach; 
   // echo '</ol>'
endforeach; 



?>