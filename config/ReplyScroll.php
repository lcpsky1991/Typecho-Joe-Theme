<?php if (!empty($this->options->JAsideBlock) && in_array('ShowAsideReplyScroll', $this->options->JAsideBlock)) : ?>
    <?php if ($this->options->JCDN == 'close') : ?>
        <script src="<?php $this->options->themeUrl('plugin/scrollText/scrollText.min.js'); ?>"></script>
    <?php else : ?>
        <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/scrollText/scrollText.min.js"></script>
    <?php endif; ?>

    <script>
        $(function() {
            new ScrollText('asideReply', '', '', true, 50, true)
        })
    </script>
<?php endif; ?>