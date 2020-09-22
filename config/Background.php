<?php if ($this->options->JCanvasType !== 'close') : ?>
    <script src="<?php $this->options->themeUrl('plugin/background/' . $this->options->JCanvasType); ?>"></script>
<?php else : ?>
    <script>
        $(function() {
            /* 背景图 */
            if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                if ('<?php $this->options->JDocumentWAPBG() ?>' !== '') {
                    $('body').css('background-image', 'url(<?php $this->options->JDocumentWAPBG() ?>)');
                }
            } else {
                if ('<?php $this->options->JDocumentPCBG() ?>' !== '') {
                    $('body').css('background-image', 'url(<?php $this->options->JDocumentPCBG() ?>)');
                }
            }
        })
    </script>
<?php endif; ?>