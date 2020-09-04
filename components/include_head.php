<!-- 公用头部 -->

<meta charset="UTF-8" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no" />
<title><?php if ($this->_currentPage > 1) echo '第 ' . $this->_currentPage . ' 页 - '; ?><?php $this->archiveTitle(array('category'  =>  _t('分类 %s 下的文章'), 'search'    =>  _t('包含关键字 %s 的文章'), 'tag'       =>  _t('标签 %s 下的文章'), 'author'    =>  _t('%s 发布的文章')), '', ' - '); ?><?php $this->options->title(); ?></title>

<?php $this->header(); ?>

<!-- 开启/关闭默认favicon -->
<?php if ($this->options->JFavicon) : ?>
    <link rel="shortcut icon" href="<?php $this->options->JFavicon() ?>" />
<?php else : ?>
    <link rel="shortcut icon" href="<?php $this->options->themeUrl('assets/img/favicon.ico'); ?>" />
<?php endif; ?>


<!-- 主题色 -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style-Brand.css'); ?>" />

<!-- 代码高亮 -->
<link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/prism.min.css'); ?>" />

<!-- 开启/关闭音乐播放器 -->
<?php if (!empty($this->options->windowBlock) && in_array('ShowAPlayer', $this->options->windowBlock)) : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/APlayer.min.css'); ?>" />
<?php endif; ?>


<!-- 开启/关闭滚动条样式 -->
<?php if (!empty($this->options->windowBlock) && in_array('ToggleScrollBarColor', $this->options->windowBlock)) : ?>
    <style>
        ::-webkit-scrollbar {
            width: 10px;
            height: 8px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 4px;
            background-color: skyblue;
            background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
        }
    </style>
<?php endif; ?>