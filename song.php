<body bgcolor="transparent" text="#FFFFFF">
		<style>
@font-face {
    font-family: "Gugi-Regular";
    font-style: normal;
    font-weight: normal;
    src: local("?"), url("/fonts/futurastd-light-webfont.woff") format("woff"), url("Gugi-Regular.ttf") format("truetype");
}</style>
<meta http-equiv="Refresh" content="20" />
<marquee scrollamount=3 scrolldelay=5 align="center">
<?
include "config.php";
if($show_song_title == 'on') {
	            $fp = @fsockopen($radio_ip, $radio_port, $errno, $errstr, 5);
                if($fp) {
                @fputs($fp,"GET /7.html HTTP/1.0\r\nUser-Agent: XML Reader(Mozilla Compatible)\r\n\r\n");
                while(!feof($fp)) {
                $dataset = @fgets($fp, 1000);
                }
                @fclose($fp);
                $entries = explode(",",$dataset);
                $status=$entries[1];
                $currentlisteners=$entries[0];
                $bitrate=$entries[5];
                $songtitle=$entries[6];
                $maxlist=$entries[3];
if($show_album_art == 'on' && $show_song_title == 'on') {
                // itunes song art this is for removing the (original mix) and some other parts from the track name, itunes doesnt like.
                $songtitle_exp = explode("-", $songtitle); // This is for itunes album search. Explodes the track name into two by using - to get the artist and track name.
                $artist = $songtitle_exp[0];
                $artist = explode(" ", $artist); // Clear feat and thirdnames that itunes search does not like
                $artist = "$artist[0]" . " $artist[1]"; // Use only two first words from the artist name, usually name and surname
                function delete_all_between($beginning, $end, $string) {
                  $beginningPos = strpos($string, $beginning);
                  $endPos = strpos($string, $end);
                  if ($beginningPos === false || $endPos === false) {
                    return $string;
                  }
                  $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);
                  return str_replace($textToDelete, '', $string);
                  }

                 $trackname = delete_all_between('(', ')', $songtitle_exp[1]);
                 $trackname = strip_tags($trackname);
                 $trackname = trim($trackname);
                // itunes song art this is for removing the (original mix) and some other parts  from the track name, itunes doesnt like.
                echo "<input id=artist type=hidden value=\"$artist\">"; // Hidden div used to give artistname to javascript on the player.php
                echo "<input id=trackname type=hidden value=\"$trackname\">"; // Hidden div used to give trackname to javascript on the player.php
}

                echo $songtitle; // This is the full songname without any filter on the player.



} // FP Ends

}
?>





