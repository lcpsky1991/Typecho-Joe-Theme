<?php if ($this->options->JDocumentTitle) : ?>
    <script>
        "use strict";$(function(){var t=document.title;$(document).on("visibilitychange",function(){"hidden"===document.visibilityState?document.title="<?php $this->options->JDocumentTitle() ?>":document.title=t})});
    </script>
<?php endif; ?>