<?php if (!empty($this->options->JWindowBlock) && in_array('ShowProgressBar', $this->options->JWindowBlock)) : ?>
    <script>
        "use strict";$(function(){var n=function(){var n=$(window).scrollTop(),o=$(document).height(),t=$(window).height(),r=n/(o-t)*100;$("#progress").css("width",r+"%")};$("#progress").length>0&&(n(),$(document).scroll(function(){return n()}))});
    </script>
<?php endif; ?>