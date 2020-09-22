<?php if ($this->options->JCursorType !== 'close') : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/cursor/<?php $this->options->JCursorType() ?>"></script>
<?php endif; ?>