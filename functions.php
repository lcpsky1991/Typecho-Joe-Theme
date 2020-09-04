<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form)
{
    /* Favicon */
    $JFavicon = new Typecho_Widget_Helper_Form_Element_Text('JFavicon', NULL, NULL, _t('1. Favicon 地址'), _t('填写图片的URL地址或者是base64的图片地址，用于修改网页标题左侧的图标，非必填项'));
    $form->addInput($JFavicon);

    /* Logo */
    $JLogo = new Typecho_Widget_Helper_Form_Element_Text('JLogo', NULL, NULL, _t('2. Logo 地址'), _t('填写图片的URL地址或者是base64的图片地址，用于修改导航栏的Logo，非必填项'));
    $form->addInput($JLogo);

    /* BanQuan */
    $JBanQuan = new Typecho_Widget_Helper_Form_Element_Text('JBanQuan', NULL, NULL, _t('3. 版权文字'), _t('填写版权信息或者是a标签跳转链接，用于修改网页最底部的版权信息，非必填项'));
    $form->addInput($JBanQuan);

    /* BanQuan */
    $JFootLink = new Typecho_Widget_Helper_Form_Element_Text('JFootLink', NULL, NULL, _t('4. 版权右侧的链接'), _t('请填写a标签跳转链接，非必填项'));
    $form->addInput($JFootLink);

    /* ASIDE QQ */
    $JQQ = new Typecho_Widget_Helper_Form_Element_Text('JQQ', NULL, NULL, _t('5. 侧边栏QQ'), _t('请务必填写正确的QQ号，用于显示侧边栏的QQ头像和点击联系QQ，非必填项'));
    $form->addInput($JQQ);

    /* ASIDE 座右铭 */
    $JMotto = new Typecho_Widget_Helper_Form_Element_Text('JMotto', NULL, NULL, _t('6. 座右铭'), _t('请填写座右铭，显示在侧边栏关于作者头像下面，建议12个字左右，非必填项'));
    $form->addInput($JMotto);

    /* ASIDE 天气KEY */
    $JWetherKey = new Typecho_Widget_Helper_Form_Element_Text('JWetherKey', NULL, NULL, _t('7. 天气的KEY值'), _t('如果关闭天气选项请忽略，开启天气如果不写会显示不了，免费申请地址：<a href="//cj.weather.com.cn">cj.weather.com.cn</a>'));
    $form->addInput($JWetherKey);

    /* ASIDE 音乐播放器 */
    $JMeting = new Typecho_Widget_Helper_Form_Element_Text('JMeting', NULL, NULL, _t('8. 音乐播放器的KEY值'), _t('网易的上https://music.163.com/登陆自己的号找一个喜欢的歌单，复制地址栏上面的ID，例如149232428'));
    $form->addInput($JMeting);

    /* 侧边栏显示项 */
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarBlock',
        array(
            'ShowAboutAuthor' => _t('启用/禁用 侧边栏关于作者'),
            'ShowTodayWether' => _t('启用/禁用 今日天气（启用务必填写上面第7项）'),
            'Show3DTag' => _t('启用/禁用 标签云'),
            'ShowReply' => _t('启用/禁用 最近回复'),
            'ShowArticle' => _t('启用/禁用 最新文章'),
        ),
        array('ShowAboutAuthor', 'ShowTodayWether', 'Show3DTag', 'ShowReply', 'ShowArticle'),
        _t('侧边栏控制')
    );
    $form->addInput($sidebarBlock->multiMode());

    /* 文章页面控制 */
    $postBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'postBlock',
        array(
            'ShowPostPagination' => _t('启用/禁用 文章分页'),
            'ShowPostBanQuan' => _t('启用/禁用 文章版权信息'),
            'ShowPostComment' => _t('启用/禁用 文章评论'),
            'ShowPostHead' => _t('启用/禁用 文章头部信息'),
            'ShowProgressBar' => _t('启用/禁用 文章进度条'),
            'ShowBarrager' => _t('启用/禁用 弹幕'),
        ),
        array('ShowPostPagination', 'ShowPostBanQuan', 'ShowPostComment', 'ShowPostHead', 'ShowProgressBar', 'ShowBarrager'),
        _t('文章页控制')
    );
    $form->addInput($postBlock->multiMode());

    /* 鼠标滚动条控制 */
    $windowBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'windowBlock',
        array(
            'ShowCursorEffects' => _t('启用/禁用 鼠标点击特效'),
            'ToggleScrollBarColor' => _t('启用/禁用 默认滚动条样式'),
            'ShowBackTop' => _t('启用/禁用 返回顶部按钮'),
            'ShowContextMenu' => _t('启用/禁用 鼠标右键'),
            'ShowAPlayer' => _t('启用/禁用 音乐播放器（启用务必填写上面第8项）'),
            'ShowCountTime' => _t('启用/禁用 网站最底部的页面加载计时'),
            'ShowLive2D' => _t('启用/禁用 Live2D小人'),
        ),
        array('ShowCursorEffects', 'ToggleScrollBarColor', 'ShowBackTop', 'ShowContextMenu', 'ShowAPlayer', 'ShowCountTime', 'ShowLive2D'),
        _t('窗口类控制')
    );
    $form->addInput($windowBlock->multiMode());

    /* 选择live2D人物 */
    $JLive2D = new Typecho_Widget_Helper_Form_Element_Select(
        'JLive2D',
        array(
            'https://unpkg.com/live2d-widget-model-miku@1.0.5/assets/miku.model.json' => _t('初音'),
            'https://unpkg.com/live2d-widget-model-shizuku@1.0.5/assets/shizuku.model.json' => _t('萌娘'),
            'https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json' => _t('小可爱（女）'),
            'https://unpkg.com/live2d-widget-model-haruto@1.0.5/assets/haruto.model.json' => _t('小可爱（男）'),
            'https://unpkg.com/live2d-widget-model-chitose@1.0.5/assets/chitose.model.json' => _t('小帅哥'),
        ),
        'https://unpkg.com/live2d-widget-model-miku@1.0.5/assets/miku.model.json',
        _t('Live2D人物模型')
    );
    $form->addInput($JLive2D->multiMode());

    /* 选择live2D小人的位置 */
    $JLive2DPosition = new Typecho_Widget_Helper_Form_Element_Select(
        'JLive2DPosition',
        array(
            'right' => _t('右侧'),
            'left' => _t('左侧'),
        ),
        'right',
        _t('Live2D人物位置')
    );
    $form->addInput($JLive2DPosition->multiMode());
}
