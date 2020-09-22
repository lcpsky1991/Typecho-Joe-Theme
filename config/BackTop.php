<?php if (!empty($this->options->JWindowBlock) && in_array('ShowBackTop', $this->options->JWindowBlock)) : ?>
    <script type="text/javascript">
        "use strict";$(function(){var o=function(){$(window).scrollTop()>500?$("#backtop").css("transform","scale(1)"):$("#backtop").css("transform","scale(0)")};$("#backtop").length>0&&(o(),$(window).on("scroll",function(){return o()})),$("#backtop").on("click",function(){$("html,body").stop().animate({scrollTop:0},300)})});
    </script>
<?php endif; ?>