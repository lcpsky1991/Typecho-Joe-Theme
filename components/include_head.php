<!-- 字符集 -->
<meta charset="utf-8" />

<!-- 渲染器选择  webkit 模式 -->
<meta name="renderer" content="webkit" />

<!-- 禁止百度转码 -->
<meta http-equiv="Cache-Control" content="no-siteapp" />

<!-- 模板信息 -->
<meta name="author" content="Joe, 2323333339@qq.com" />

<!-- 以最高版本渲染页面 -->
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

<!-- 视图窗口 -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">

<!-- 自有函数 -->
<?php $this->header('commentReply='); ?>


<?php if ($this->options->JCDN == 'close') : ?>
    <!-- 全局样式 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.min.css'); ?>" />
    <!-- 移动端样式 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style-wap.min.css'); ?>" />
    <!-- 代码高亮 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('plugin/prism/prism.min.css'); ?>" />
    <script src="<?php $this->options->themeUrl('plugin/prism/prism.min.js'); ?>"></script>
<?php else : ?>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/assets/css/style.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/assets/css/style-wap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/prism/prism.min.css" />
    <script src="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/plugin/prism/prism.min.js"></script>
<?php endif; ?>

<!-- 网站标题 -->
<title><?php if ($this->_currentPage > 1) echo '第 ' . $this->_currentPage . ' 页 - '; ?><?php $this->archiveTitle(array('category'  =>  _t('分类 %s 下的文章'), 'search'    =>  _t('包含关键字 %s 的文章'), 'tag'       =>  _t('标签 %s 下的文章'), 'author'    =>  _t('%s 发布的文章')), '', ' - '); ?><?php $this->options->title(); ?></title>

<!-- 开启/关闭默认favicon -->
<?php if ($this->options->JFavicon) : ?>
    <link rel="shortcut icon" href="<?php $this->options->JFavicon() ?>" />
<?php else : ?>
    <?php if ($this->options->JCDN == 'close') : ?>
        <link rel="shortcut icon" href="<?php $this->options->themeUrl('assets/img/favicon.ico'); ?>" />
    <?php else : ?>
        <link rel="shortcut icon" href="//cdn.jsdelivr.net/npm/typecho_joe_theme@<?php echo getVersion() ?>/assets/img/favicon.ico" />
    <?php endif; ?>
<?php endif; ?>