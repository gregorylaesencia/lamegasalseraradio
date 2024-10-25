		<style>
@font-face {
    font-family: "Gugi-Regular";
    font-style: normal;
    font-weight: normal;
    src: local("?"), url("/fonts/futurastd-light-webfont.woff") format("woff"), url("Gugi-Regular.ttf") format("truetype");
}</style>
<font face="Gugi-Regular">
<?
//Radio Options
$radio_ip = 'sonica1.mooo.com';
$radio_port = '8050';
$show_song_title = 'on'; // show_song_title: on - off. When it is on, it will show the currently playing song name on the player.
$show_album_art = 'on'; // Options: on - off. If this is on, the script will search the itunes search API for the currently playing song image and will show it on the player. If it doesnt find the image on itunes, it will not show the image and div. The script inserts the image file into <img src="now-playing.png"> in the player.php file. You can change the location of this image on the page or on your website. If $show_song_title is set off, this option will be ignored and set off. This is only available when $show_song_title is on.

$song_title_update = '1'; // The song name update interval in MINUTE form. 2 means 2 minute. That means the script will update the song name and album art every 2 minutes.

// Color Options, if you need white or transparent background use preimg.light.png and other .png files in the img folder, set them in js/player.css.
$song_title_color = '#ffffff';
$player_background_color = ' #c0c0c0';
$player_size_width = '150px'; // Minumum 150px is suggested, below 300 the song name will expand if it is long.
$song_title_width = '150px';


?>