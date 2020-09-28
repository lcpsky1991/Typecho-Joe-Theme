<?php if ($this->options->JCDN == 'close') : ?>
    <script src="<?php $this->options->themeUrl('plugin/barrager/barrager.min.js'); ?>"></script>
<?php else : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/barrager/barrager.min.js"></script>
<?php endif; ?>
<script>
    "use strict";$(function(){if($(".j-barrager-list").length>0){var r=[];$(".j-barrager-list li").each(function(a,t){/\{!\{.*/.test($(t).find(".j-barrager-list-content").html())||r.push({html:'<img src="'+$(t).find(".j-barrager-list-avatar").attr("data-src")+'" /><p>'+$(t).find(".j-barrager-list-content").html()+"</p>"})}),r.forEach(function(r){$("body").barrager(r)})}"on"===localStorage.getItem("barragerStatus")?($("#barragerSwitch").attr("checked",!0),$(".j-barrager").css({opacity:1,visibility:"visible"})):($("#barragerSwitch").attr("checked",!1),$(".j-barrager").css({opacity:0,visibility:"hidden"})),$("#barragerSwitch").on("change",function(){localStorage.setItem("barragerStatus",$(this).prop("checked")?"on":"off"),$("#barragerSwitch").prop("checked")?$(".j-barrager").css({opacity:1,visibility:"visible"}):$(".j-barrager").css({opacity:0,visibility:"hidden"})})});
</script>
