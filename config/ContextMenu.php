<?php if (!empty($this->options->JWindowBlock) && in_array('ShowContextMenu', $this->options->JWindowBlock)) : ?>
    <script type="text/javascript">
        "use strict";$(function(){$(document).on("contextmenu",function(n){return!1})});
    </script>
<?php endif; ?>