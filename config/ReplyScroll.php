<?php if ($this->options->JCDN == 'close') : ?>
    <script src="<?php $this->options->themeUrl('plugin/scrollText/scrollText.min.js'); ?>"></script>
<?php else : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/scrollText/scrollText.min.js"></script>
<?php endif; ?>

<script>
    "use strict";
    $(function() {
        if ($("#asideReply").length > 0) {
            new ScrollText("asideReply", "", "", !0, 50, !0)
        }
    });
</script>