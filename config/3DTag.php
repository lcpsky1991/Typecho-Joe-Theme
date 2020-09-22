<?php if (!empty($this->options->JAsideBlock) && in_array('ShowAside3DTag', $this->options->JAsideBlock)) : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@1.0.5/plugin/svg3dtagcloud/svg3dtagcloud.min.js"></script>
    <script>
        "use strict";$(function(){if($("#cloudList").length>0){var t=Array.from($("#cloudList li")).map(function(t){return{label:$(t).attr("data-label"),url:$(t).attr("data-url")}});$("#cloud").svg3DTagCloud({entries:t,width:230,height:230,radius:"65%",radiusMin:75,bgDraw:!0,bgColor:"#303133",opacityOver:1,opacityOut:.05,opacitySpeed:6,fov:800,speed:.5,fontSize:"14",fontColor:"#fff",fontWeight:"500",fontStyle:"normal",fontStretch:"normal",fontToUpperCase:!0})}});
    </script>
<?php endif; ?>