<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="Joe, 2323333339@qq.com" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <title><?php if ($this->_currentPage > 1) echo '第 ' . $this->_currentPage . ' 页 - '; ?><?php $this->archiveTitle(array('category'  =>  _t('分类 %s 下的文章'), 'search'    =>  _t('包含关键字 %s 的文章'), 'tag'       =>  _t('标签 %s 下的文章'), 'author'    =>  _t('%s 发布的文章')), '', ' - '); ?><?php $this->options->title(); ?></title>
    <?php if ($this->options->JFavicon) : ?>
        <link rel="shortcut icon" href="<?php $this->options->JFavicon() ?>" />
    <?php else : ?>
        <?php if ($this->options->JCDN == 'close') : ?>
            <link rel="shortcut icon" href="<?php $this->options->themeUrl('assets/img/favicon.ico'); ?>" />
        <?php else : ?>
            <link rel="shortcut icon" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/assets/img/favicon.ico" />
        <?php endif; ?>
    <?php endif; ?>


    <?php if ($this->options->JCDN == 'close') : ?>
        <link rel="stylesheet" href="<?php $this->options->themeUrl('plugin/404/404.min.css'); ?>">
    <?php else : ?>
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/404/404.min.css">
    <?php endif; ?>

</head>

<body>
    <h1> - 4 0 4 - </h1>
    <h1> - 这个页面已经不在了 - </h1>
    <div id="svgContainer"></div>
    <a href="<?php $this->options->siteUrl(); ?>">返回首页</a>

    <?php if ($this->options->JCDN == 'close') : ?>
        <script type="text/javascript" src="<?php $this->options->themeUrl('plugin/404/bodymovin.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php $this->options->themeUrl('plugin/404/data.min.js'); ?>"></script>
    <?php else : ?>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/404/bodymovin.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/404/data.min.js"></script>
    <?php endif; ?>

    <script type="text/javascript">
        var svgContainer = document.getElementById('svgContainer');
        var animItem = bodymovin.loadAnimation({
            wrapper: svgContainer,
            animType: 'svg',
            loop: true,
            animationData: JSON.parse(animationData)
        });
    </script>
</body>

</html>