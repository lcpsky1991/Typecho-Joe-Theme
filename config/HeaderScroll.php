<?php if (!empty($this->options->JWindowBlock) && in_array('ShowHeaderScroll', $this->options->JWindowBlock)) : ?>
    <script type="text/javascript">
        "use strict";$(function(){var e=0,s=0;$(window).scroll(function(){e=$(this).scrollTop(),s<=e?$(".j-header").addClass("active"):$(".j-header").removeClass("active"),s=e})});
    </script>
<?php endif; ?>