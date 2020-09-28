<div class="j-head-wap">
    <!-- L O G O -->
    <a class="logo" href="<?php $this->options->siteUrl(); ?>">
        <?php if ($this->options->JLogo) : ?>
            <img src="<?php $this->options->JLogo() ?>" />
        <?php else : ?>
            <?php if ($this->options->JCDN == 'close') : ?>
                <img src="<?php $this->options->themeUrl('assets/img/logo.png'); ?>" />
            <?php else : ?>
                <img src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/assets/img/logo.png" />
            <?php endif; ?>
        <?php endif; ?>
    </a>

    <div class="button">
        
    </div>
</div>