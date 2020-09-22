<!-- 面包屑导航 -->

<ul class="j-bread">
    <li>
        <a href="<?php $this->options->siteUrl(); ?>">首页</a>
    </li>
    <li class="line">/</li>
    <li>
        <?php $this->category(' + '); ?>
    </li>
    <li class="line">/</li>
    <li><?php $this->title() ?></li>
</ul>