<?php if (!empty($this->options->JWindowBlock) && in_array('ShowConsole', $this->options->JWindowBlock)) : ?>
    <script>
        $(function(){let ConsoleManager={onOpen:function(){try{window.open("<?php $this->options->themeUrl(); ?>console.html",target="_self")}catch(e){var n=document.createElement("button");n.onclick=function(){window.open("<?php $this->options->themeUrl(); ?>console.html",target="_self")},n.click()}},onClose:function(){alert("Console is closed!!!!!")},init:function(){var e=this,n=document.createElement("div"),t=false,o=false;Object.defineProperty(n,"id",{get:function(){t||(e.onOpen(),t=!0),o=!0}}),setInterval(function(){o=!1,console.info(n),console.clear(),!o&&t&&(e.onClose(),t=!1)},100)}};ConsoleManager.init()})
    </script>
<?php endif; ?>