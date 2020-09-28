<?php if ($this->options->JCDN == 'close') : ?>
    <script src="<?php $this->options->themeUrl('plugin/cursor/' . $this->options->JCursorType); ?>"></script>
<?php else : ?>
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/cursor/<?php $this->options->JCursorType() ?>"></script>
<?php endif; ?>