
<html>
  <head>
   
    <meta name="author" content="Berk Coþar">
    <meta name="description" content="dataget panel">
    <meta name="keywords" content="veri,veri cekme,php">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataGet</title>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <style>
        body{background-color:#000;overflow:hidden;}
	*{margin:0;padding:0;border:0;}
    .uzay{height:100vh;position:absolute;top:0;left:0;z-index:999;}
	.back{width:100%;height:100vh;background-image:url("dataGet_image/background.jpeg");background-size:cover;opacity:0.7;filter:blur(25px);}
	.header{width:'100%';height:50px;left:-250px;position:absolute;top:2;}
	.menu_btn{width:40px;height:40px;float:left;margin-left:2px;background-color:#111;opacity:0.4;transition:0.3s linear;cursor:pointer;position:relative;z-index:10;}
    .menu_btn:hover{opacity:0.6;}	
    .menu_czg{width:20px;height:2px;border:1px solid gray;border-radius:1px;background-color:gray;margin:0 auto;margin-top:7px;}
    .profil{width:auto;height:40px;position:fixed;float:right;right:15px;top:2px;}   
	.isim{width:auto;height:40px;text-align:center;line-height:40px;color:#ccc;font-size:15px;font-weight:bold;float:left;}
	.profil_resim{width:40px;height:40px;border-radius:50%;border:1px solid #ccc;background-image:url('dataGet_image/profil.jpeg');background-size:cover;float:left;margin-left:10px;}
    .panel{width:168px;height:100vh;left:-250px;float:left;top:44px;opacity:0.4;background-color:black;position:absolute;z-index:555;}
	.wrapper{position:absolute;left:0;top:0;z-index:9;width:100%;height:100vh;}
	.input_alan{width:500px;height:40px;border:1px solid black;margin:0 auto;margin-top:-20px;top:35%;position:relative;box-shadow:5px 10px 18px  black;}
	.get_btn{width:40px;height:40px;background-color:#cc7a00;position:absolute;z-index:1;float:right;right:0;top:0;}
	.icon{width:100%;height:100%;transform:scale(0.6);transition:0.3s linear;cursor:pointer;}
	.icon:hover{transform:scale(0.7);}
	.input_arama{width:100%;height:40px;background-color:transparent;color:#ccc;font-size:15px;text-align:center;line-height:40px;}
        ::placeholder {  color:#ccc; opacity: 1;}
	input[type=text]:focus{outline: 2px solid #cc7a00;}
        .icon_alan{width:500px;height:140px;margin:0 auto;margin-top:-50px;top:30%;position:relative;}   
        .dataget_ikon{width:100px;height:100px;margin:0 auto;}
	.icon_m{width:90%;height:90%;}
	.dataget_text{width:100%;height:40px;font-size:40px;color:#ccc;text-align:center;line-height:40px;}
		.i{position:fixed;z-index:9999;font-size:25px;bottom:0;right:15px;;color:black;font-weight:bold;}
        .inputed_url{width:100%;height:50px;color:crimson;font-size:25px;font-weight:999;text-align:center;line-height:50px;}
        .select_box{width:100%;height:40px;background-color:#111;position:relative;cursor:pointer;}
        .select_box_text{width:90%;height:40px;color:white;font-size:13px;font-weight:555;;line-height:40px;margin-left:10px;}
        .select_box:hover{width:100%;height:40px;background-color:#111;position:relative;cursor:pointer;}
          .select_box_text_ktg{width:90%;height:40px;color:white;font-size:13px;font-weight:555;;line-height:40px;margin-left:10px;}
          .select_box_text_menu{width:90%;height:40px;color:white;font-size:13px;font-weight:555;;line-height:40px;margin-left:10px;}
          .select_box_text_ktg_menu{width:90%;height:40px;color:white;font-size:13px;font-weight:555;;line-height:40px;margin-left:10px;}
          .kt_box:hover{background-color:#333;}
        .select_btn{width:40px;height:40px;color:white;text-align:center;font-size:15px;line-height:40px;position:absolute;right:0;top:0;font-weight:900;transition:0.3s linear}
         .child_box{width:100%;height:400px;background-color:#000;overflow-y:scroll;display:none;}


::-webkit-scrollbar {width: 5px;height:8px;}
::-webkit-scrollbar-track { background: #000;}
::-webkit-scrollbar-thumb {  background: #555;}
::-webkit-scrollbar-thumb:hover { background: #ccc;}

::-o-scrollbar {width: 5px;height:8px;}
::-o-scrollbar-track { background: #000;}
::-o-scrollbar-thumb {  background: #555;}
::-o-scrollbar-thumb:hover { background: #ccc;}

::-moz-scrollbar {width: 5px;height:5px;}
::-moz-scrollbar-track { background: #000;}
::-moz-scrollbar-thumb {  background: #555;}
::-moz-scrollbar-thumb:hover { background: #ccc;}

::-ms-scrollbar {width: 5px;height:8px;}
::-ms-scrollbar-track { background: #000;}
::-ms-scrollbar-thumb {  background: #555;}
::-ms-scrollbar-thumb:hover { background: #ccc;}

 .prosess{width:100%;height:100vh;background-color:black;position:absolute;top:0;left:0;float:left;z-index:99999;opacity:0.8;display:none;}
 .loader{ margin:100px auto;height:20%;width:20%;text-align: center;} svg path,svg rect{fill: #FF6700;}
 #down_btn{background-color:#cc7a00;transition:0.3s linear;}#down_btn:hover{background-color:orange;}#down_xml{color:black;font-weight:bold;text-align:center;}
.downP{width:100px;height:30px;background-color:#cc7a00;position:fixed;bottom:30px;left:50%;margin-left:-50px;text-align:center;line-height:30px;}
      </style>
  </head>


 <body>
  
   <div class="back"> </div>
  <div class="uzay">
         <div class="prosess">
              <!-- 3  -->
              <div class="loader loader--style3" title="2">
               <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               width="140px" height="140px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
               <path fill="#000" d="M43.935,25.145c0-10.318-8.364-18.683-18.683-18.683c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615c8.072,0,14.615,6.543,14.615,14.615H43.935z">
               <animateTransform attributeType="xml"
                attributeName="transform"
                type="rotate"
                from="0 25 25"
                to="360 25 25"
                dur="0.6s"
                repeatCount="indefinite"/>
              </path>
             </svg>
            </div>
         </div>
     <div class="header">
          <div id="menu_btn" class="menu_btn"><img src="dataGet_image/dataget_icon.png" class="icon"/> </div>
          <div id="men" class="menu_btn"><img src="dataGet_image/fast.png" class="icon"/> </div>
          <div id="men" class="menu_btn"><img src="dataGet_image/ayar.png" class="icon"/> </div>
	  <div id="men" class="menu_btn"><img src="dataGet_image/exit.png" class="icon"/> </div>
   
          <div class="profil">
           <div class="isim">Berk Cosar</div>
           <div class="profil_resim"></div>
	  </div>
     </div>





     <div  class="panel">
          <div class="inputed_url">  <?php echo $_POST['url']; ?> </div>
          <div id="kategori" class="select_box">
                <div id ="ktg" class="select_box_text">Kategori Seçin</div>
                <div id="kategori_select_box" class="select_btn">V</div>                        
          </div>
           <div id="kategori_child" class="child_box">  <?php require "./dataget_api/navigations/ktg_web_search.php"; ?>   </div>

          <div id="alt_kategori" class="select_box">
                <div id ="alt_ktg" class="select_box_text">Alt Kategori Seçin</div>
                <div id="alt_ktg_select_box" class="select_btn">V</div>                        
          </div>
           <div id="alt_kategori_child" class="child_box"><div class="alt"></div></div>


                <div id="alt_menu_kategori" class="select_box">
                <div id ="alt_menu_ktg" class="select_box_text">alt kategori menu Seçin</div>
                <div id="alt_ktg_menu_select_box" class="select_btn">V</div>                        
          </div>
           <div id="alt_menu_kategori_child" class="child_box"><div class="alt2"></div></div>
              <div style ="display:none" id="down_btn" class="select_box">
                <div  id ="down_xml" class="select_box_text">EXPORT AS XML</div>
             </div>              



    </div>


         
    
     <div class="wrapper">
       <div class="icon_alan">
	 <div class="dataget_ikon">
	   <img src="dataGet_image/dataget_icon.png" class="icon_m"/>
	 </div>
	 <div class="dataget_text">DataGet</div>
       </div>
       <div class="input_alan">
          <form id="form" action="" method="post">                          
	 <input name="url" class="input_arama" type="text" placeholder="Veri Çekmek Adresi Girin"/>
	 <div class="get_btn"><img src="dataGet_image/next.png" class="icon"/></div>
            <input style="display:none;"  type="submit"/>
        </form>                            
       </div>


    </div>
           <div class="i">2019 @ Berk Cosar</div>
  </div>
  
    <form id="ktg_alt" action="" method="post">
         <input name="ktg" class="input_ktg" style="display:none;" type="text"/>
            <input class="submit_ktg" style="display:none;"  type="submit"/>
                                                                                                    
   </form>

 </body>

</html>

<script type="text/javascript">window.onerror = function(a,b,c){console.log(a+b+c);}  </script>
<script>

$(document).ready(function(){
    var ktg_url = [];

    //var web = $(".inputed_url").text().toLowerCase().trim();
    var web = "trendyol";
    var width = screen.width;
    var height = screen.height;
    $('.uzay').css({"width":width});
    $('.panel').animate({"left":"0"},1000);
    $('.header').animate({"left":"0"},1000);   
    $('.get_btn').on("click" ,function(){
      
	var link = $(".input_arama").val().toLowerCase().replace("https://www.","").replace(".com/","").toUpperCase().trim();
        $(".input_arama").val("");
	$(".input_arama").val(link);

	$('#form').submit();
	
    });

    $("#kategori").on("click",function(){
        
        $("#kategori_select_box").css({
          '-moz-transform':'rotate(180deg)',
          '-webkit-transform':'rotate(180+deg)',
          '-o-transform':'rotate(180deg)',
          '-ms-transform':'rotate(180deg)',
          'transform':'rotate(180deg)'});
        $('#kategori_child').css({"display":"block"});
        $("#kategori").css({"border-bottom":"1px solid #555"})
    });
     $("#alt_kategori").on("click",function(){
        
        $("#kategori_select_box").css({
          '-moz-transform':'rotate(180deg)',
          '-webkit-transform':'rotate(180+deg)',
          '-o-transform':'rotate(180deg)',
          '-ms-transform':'rotate(180deg)',
          'transform':'rotate(180deg)'});
        $('#alt_kategori_child').css({"display":"block"});
        $("#alt_kategori").css({"border-bottom":"1px solid #555"})
    });
      $("#alt_menu_kategori").on("click",function(){
        $("#kategori_select_box").css({
          '-moz-transform':'rotate(180deg)',
          '-webkit-transform':'rotate(180+deg)',
          '-o-transform':'rotate(180deg)',
          '-ms-transform':'rotate(180deg)',
          'transform':'rotate(180deg)'});
        $('#alt_menu_kategori_child').css({"display":"block"});
        $("#alt_menu_kategori").css({"border-bottom":"1px solid #555"})
    });
         
      //   function clear(){ktg_url[0]="";ktg_url[1] = "";ktg_url[2] = "";ktg_url[3] = "";};
    $(document).on("click",".select_box_text_ktg",function(event){

         event.preventDefault();
         $(".prosess").css({"display":"block"});
         var id = this.id;
         ktg_url[0] = id;
         var val = this.title;
         $('#ktg').html(val);
         ktg_url[2] = val;
        $("#alt_ktg_select_box").css({
          '-moz-transform':'rotate(0deg)',
          '-webkit-transform':'rotate(0+deg)',
          '-o-transform':'rotate(0deg)',
          '-ms-transform':'rotate(0deg)',
          'transform':'rotate(0deg)'});
        $('#kategori_child').css({"display":"none"});
        $("#kategori").css({"border-bottom":"0"});
        $('#alt_kategori_child').css({"display":"block"});
        $("#alt_kategori").css({"border-bottom":"1px solid #555"});
        var urll="dataget_api/navigations/fast/"+ web +"/ktg_alt_"+ web +".php";
             
                         $.ajax({
                           type:"POST",
                           url:urll,
                           data:{"ktg":id},
                           success:function(result){
                                $('.alt').remove();
                               $("#alt_kategori_child").append("<div class='alt'></div>");
                             
                               var res = val.toLowerCase();
                               $('.alt').append(result); 
                               $(".prosess").css({"display":"none"});              
                           }
                              });
            
            
                         
    });


     $(document).on("click","#alt_ktg_box",function(event){
         event.preventDefault();
         $(".prosess").css({"display":"block"});
         var d = $(this).index()-1;
         var di = $(this).index();
         var alt_ktg_val = $(this).text();
         $("#alt_ktg").html(alt_ktg_val);
         ktg_url[3] = alt_ktg_val.toLowerCase().replace(" ","-");
           $("alt_ktg_menu_select_box").css({
          '-moz-transform':'rotate(0deg)',
          '-webkit-transform':'rotate(0+deg)',
          '-o-transform':'rotate(0deg)',
          '-ms-transform':'rotate(0deg)',
          'transform':'rotate(0deg)'});
        $('#alt_kategori_child').css({"display":"none"});
        $("#alt_kategori").css({"border-bottom":"0"});

        $('#alt_menu_kategori_child').css({"display":"block"});
        $("#alt_menu_kategori").css({"border-bottom":"1px solid #555"});
      
        //    $.ajax({  type:"POST",  url:"dataget_api/navigations/fast/trendyol/ktg_alt_trendyol_url.php",data:{"ktg":ktg_url[0],"ktg_id":d},success:function(resa){ ktg_url[1] =resa.replace("\n<body style='background-color:black;color:white;'><style>a{color:gray;}</style>","");  console.log(ktg_url[1]);} });
        var idd = ktg_url[0];
       
                                $.ajax({
                           type:"POST",
                           url:"dataget_api/navigations/fast/"+ web +"/ktg_alt_menu_"+ web +".php",
                                 data:{"ktg_menu_id":idd,"ktg_di":d},
                           success:function(res){
                               //console.log(res);
                                $('.alt2').remove(); 
                               $("#alt_menu_kategori_child").append("<div class='alt2'></div>");
                               $('.alt2').append(res); 
                               $(".prosess").css({"display":"none"});
                           }
                               });

                         
                         
     });

     $(document).on("click","#kt_box_ktg_menu",function(event){
   event.preventDefault();
   $(".prosess").css({"display":"block"});
        var alt_ktg_menu_val = $(this).text();
      
         $("#alt_menu_ktg").html(alt_ktg_menu_val);
         
        $('#alt_menu_kategori_child').css({"display":"none"});
        $("#alt_menu_kategori").css({"border-bottom":"0"});

   var ktg_menu_url = this.title;
   var ana_menu = ktg_url[2];
   var alt_menu = ktg_url[3];
   var alt_ktg_a = alt_ktg_menu_val.trim();
          
                     $.ajax({
                         type:"POST",
                         url:"dataget_api/navigations/fast/"+ web +"/"+ web +"_urunler.php",
                         data:{"ktg_menu_url":ktg_menu_url,"ana_menu":ana_menu,"alt_menu":alt_menu,"alt_ktg_a":alt_ktg_a},
                         success:function(ress){
                             //alert("başarılı");
                           $(".prosess").css({"display":"none"});
                           $("#down_btn").css({"display":"flex"});
                           
                         }

                          });
     });
     $("#down_btn").click(function(){
               $(".prosess").css({"display":"flex"});
         var k_adi="berk";
         $.ajax({
                 type:"POST",
          url:"dataget_api/navigations/createzip.php",
          data:{"k_adi":k_adi,"web":web},
                 success:function(ev){
                     $('#loader-1').remove();
                     $(".prosess").append("<h1 style='width:100%;height:300px;color:white;font-size:7px;text-align:center;float:left;position:fixed;top:50px;'>"+ ev +"</h1>");
                     $(".prosess").append("<div class='downP' ><a class='dw' style='display:flex;color:black;text-decoration:none;' href='dataget_api/navigations/"+ k_adi +"-"+ web +".zip' download>indir</a></div>");
                     // $(".dw").click();
                 }
             });
         
     });

    
});
</script>


