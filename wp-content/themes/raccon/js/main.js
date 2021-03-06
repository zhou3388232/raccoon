
(function($) {
  $(function() {

//    var html_scroll = function(){
//        var hash=window.location.hash;
//        var bodyclassname = $('body').attr('class');
//        if( bodyclassname=='index'
//            ||bodyclassname=='blog-list'
//            ||hash=="#mapbar"){
//            return;
//        } else {
//            $('html, body').animate(
//            { scrollTop: 480 },
//            '800',
//            'swing'
//            );
//        };
//    }

    // navigation
    var navigationFun=function(){
        if($(window).scrollTop() > 0){
            $('header').addClass('fix');
          }else{
            $('header').removeClass('fix');
          }

        $(window).scroll(function (){
            if($(window).scrollTop() > 0){
                $('header').addClass('fix');
            }else{
                $('header').removeClass('fix');
            }
        });
    }

    if ($('html').width()>789) {
//        html_scroll();
        navigationFun();
    };

    // mobile nav
    var mobileNav=function(){
        $('body').on('click','header .open',function(){
            $(this).removeClass('active');
            $('header .topnav, .sidebar , .close ').addClass('active');
            return false;
        });
        $('body').on('click','header .close',function(){
            $('header .topnav, .sidebar').removeClass('active');
            $(this).removeClass('active');
            $('.open').addClass('active');
            return false;
        });
    }

    //mobile pic=>bg
    var mobilePic = function(picbox){
        if (picbox) {
            $(picbox).each(function(){
                var url=$(this).find('img').attr('src');
                $(this).css('background-image','url('+url+')');
            });
        }else{
            return;
        };
    }

    if ($('html').width()<789) {
        mobileNav();
        mobilePic($('.banner-bg'));
        if ($('body').attr('class')!='contact') {
            mobilePic($('.section-3'));
        }
        
    };

    window._bd_share_config={
                "common":{  "bdSnsKey":{},
                            "bdText": $('h1').text(),
                            "bdUrl" : window.location.href, 
                            "bdMini":"1",
                            "bdMiniList":false,
                            "bdPic":"", //分享的图片链接
                            "bdStyle":"9",
                            "bdSize":"32"},
                "share":{
                    "tag" : "share_1",
                    "bdSize" : 0,
                }
    };
    with(document)0[(getElementsByTagName('head')[0]||body)
        .appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];

    //baidu map
    function initMap(){
      createMap();//创建地图
      setMapEvent();//设置地图事件
      addMapControl();//向地图添加控件
      addMapOverlay();//向地图添加覆盖物
    }
    function createMap(){ 
      map = new BMap.Map("map"); 
      map.centerAndZoom(new BMap.Point(114.065997,22.568593),16);
    }
    function setMapEvent(){
      map.enableScrollWheelZoom();
      map.enableKeyboard();
      map.enableDragging();
      map.enableDoubleClickZoom()
    }
    function addClickHandler(target,window){
      target.addEventListener("click",function(){
        target.openInfoWindow(window);
      });
    }

    function addMapOverlay(){
      var markers = [
        {content:"福田区上梅林多丽工业园区2栋606B",title:"洛酷科技",imageOffset: {width:1,height:3},position:{lat:22.568790,lng:114.06199}}
      ];
      for(var index = 0; index < markers.length; index++ ){
        var point = new BMap.Point(markers[index].position.lng,markers[index].position.lat);
        var marker = new BMap.Marker(point,{icon:new BMap.Icon("http://www.raccoon-tech.com/wp-content/uploads/2016/01/cursor.gif",new BMap.Size(20,30),{
          imageOffset: new BMap.Size(markers[index].imageOffset.width,markers[index].imageOffset.height)
        })});
        var label = new BMap.Label(markers[index].title,{offset: new BMap.Size(25,5)});
        var opts = {
          width: 200,
          title: markers[index].title,
          enableMessage: false
        };
        var infoWindow = new BMap.InfoWindow(markers[index].content,opts);
        marker.setLabel(label);
        
        addClickHandler(marker,infoWindow);
        map.addOverlay(marker);
      };
    }
    //向地图添加控件
    function addMapControl(){
      var scaleControl = new BMap.ScaleControl({anchor:BMAP_ANCHOR_TOP_LEFT});
      map.addControl(scaleControl);
      var navControl = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
      map.addControl(navControl);
    }
    

    if ($('body').attr('class')=='contact') {
        var map;
        initMap();
        map.addEventListener("tilesloaded",function(){
            $('.BMap_cpyCtrl.BMap_noprint.anchorBL').css('display','none');
            $('label.BMapLabel').css('padding','3px');
            if ($('html').width()<789){
                $('#map').css('width','85%');
                $('.BMap_Marker img').css({'opacity':'1','margin':'0'});
            };
        });
    };

  });
})(jQuery);
