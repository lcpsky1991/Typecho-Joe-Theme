<script>
    "use strict";$(function(){var n=function(){var n=$(window).scrollTop(),o=$(document).height(),r=$(window).height(),t=n/(o-r)*100;$("#progress").css("width",t+"%")};$("#progress").length>0&&(n(),$(window).on("scroll",function(){return n()}))});
</script>