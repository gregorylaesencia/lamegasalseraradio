// *** WRD Current Song by Antonello Autore 2022 ***         
$(function() { 
    var wrdloc = window.location.pathname;
    var wrddir = wrdloc.substring(0, wrdloc.lastIndexOf('/'));
    //console.log(wrddir);


    function foo() {  
          // Retrieve Audio Source from PLAYER 
          var audiostream = $('#ap').data('streaming');
          console.log('audio: '+audiostream);
          var startPoint=audiostream.indexOf("https://")+8;
          var lengthPoint=audiostream.indexOf(":", startPoint)-startPoint;
          var ipStream=audiostream.substr(startPoint,lengthPoint);
          console.log('host: '+ipStream);
          var startPoint2= audiostream.indexOf(":", startPoint)+1;
          var lengthPoint2=audiostream.indexOf("/", startPoint2)-startPoint2;
          var portStream=audiostream.substr(startPoint2,lengthPoint2);
          console.log('port: '+portStream);
          var startPoint3= audiostream.indexOf("/", startPoint2)+1; 
          var mountStream=audiostream.substr(startPoint3,10);
          console.log('mount '+mountStream);                         
          var typeStream = $('#ap').data('type');           
          console.log('type: '+typeStream);                         
           
          var url = 'http://sonica1.no-ip.biz:8088/data/Copia%20de%20data%202.php?host='+ipStream+'&port='+portStream+'&strm='+typeStream+'&mount='+mountStream+'';
          console.log(url);   
          $.ajax({        
            url: url,
            type: 'GET',
            cache: 'false',
            dataType: 'json',
            success: function (data1, textStatus) { 
                var $NowPlayingTemp;          
                if ( data1[0] == null ) data1[0]="";
                if ( data1[1] == null ) data1[1]="";
                if ( data1[0]!="" ) {
                var curSong = data1[0] +' - '+ data1[1]; 
                } else {
                var curSong = data1[1]; 
                }
                console.log(curSong);  
                $("#current-track").html('Stai ascoltando: '+curSong);        
                $("#stats").html(curSong);
                $(".banner-dark-rrn .item .cover .header-content .songTitle").html(data1[1]); 
                $(".banner-dark-rrn .item .cover .header-content .songArtist").html(data1[0]); 
                //$(document).prop('title', curSong + ' - RETERADIO NETWORK'); 
                // Notify change song
                //attr = {icon: './images/notifyimage.png', body: 'Stai ascoltando '+curSong, tag: 'WRD Music Player'};
                //window.Notification.requestPermission(function(access) {
                //  if(access === 'granted') {
                //    var notice = new Notification('ReteRadio Network', attr);
                //    setTimeout(notice.close.bind(notice), 5000);
                //  }
                //});         
            }
  
          });
    }   
    foo();
    setInterval(foo, 25000);

}); 
