<?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideReplyScroll', $this->options->JAsideBlock)) : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@1.0.5/plugin/scrollText/scrollText.min.js"></script>
    <script>
        $(function() {
            new ScrollText('asideReply', '', '', true, 50, true)
        })
    </script>
<?php endif; ?>
