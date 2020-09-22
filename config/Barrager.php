<?php if (!empty($this->options->JWindowBlock) && in_array('ShowBarrager', $this->options->JWindowBlock)) : ?>
    
    <?php if ($this->options->JCDN == 'close') : ?>
        <script src="<?php $this->options->themeUrl('plugin/barrager/barrager.min.js'); ?>"></script>
    <?php else : ?>
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/barrager/barrager.min.js"></script>
    <?php endif; ?>


    <script>
        "use strict";$(function(){if($(".j-barrager-list").length>0){Array.from($(".j-barrager-list li")).map(function(r){return{html:'<img src="'+$(r).find(".j-barrager-list-avatar").attr("data-src")+'" /><p>'+$(r).find(".j-barrager-list-content").html()+"</p>"}}).forEach(function(r){return $("body").barrager(r)})}"on"===localStorage.getItem("barragerStatus")?($("#barragerSwitch").attr("checked",!0),$(".j-barrager").css({opacity:1,visibility:"visible"})):($("#barragerSwitch").attr("checked",!1),$(".j-barrager").css({opacity:0,visibility:"hidden"})),$("#barragerSwitch").on("change",function(){localStorage.setItem("barragerStatus",$(this).prop("checked")?"on":"off"),$("#barragerSwitch").prop("checked")?$(".j-barrager").css({opacity:1,visibility:"visible"}):$(".j-barrager").css({opacity:0,visibility:"hidden"})})});
    </script>
<?php endif; ?>