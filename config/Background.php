<?php if (!isMobile()) : ?>
    <?php if ($this->options->JCanvasType !== 'close') : ?>
        <?php if ($this->options->JCDN == 'close') : ?>
            <script src="<?php $this->options->themeUrl('plugin/background/' . $this->options->JCanvasType); ?>"></script>
        <?php else : ?>
            <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/background/<?php $this->options->JCanvasType() ?>"></script>
        <?php endif; ?>
    <?php else : ?>
        <script>
            $(function() {
                if ('<?php $this->options->JDocumentPCBG() ?>' !== '') {
                    $('body').css('background-image', 'url(<?php $this->options->JDocumentPCBG() ?>)');
                }
            })
        </script>
    <?php endif; ?>
<?php else : ?>
    <script>
        $(function() {
            if ('<?php $this->options->JDocumentWAPBG() ?>' !== '') {
                $('body').css('background-image', 'url(<?php $this->options->JDocumentWAPBG() ?>)');
            }
        })
    </script>
<?php endif; ?>