<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form)
{
    /* Favicon */
    $JFavicon = new Typecho_Widget_Helper_Form_Element_Text('JFavicon', NULL, NULL, _t('1. 站点 Favicon 地址'), _t('在这里填入一个图片 URL 或 BASE64 地址，不填写会显示默认 Favicon'));
    $form->addInput($JFavicon);

    /* Logo */
    $JLogo = new Typecho_Widget_Helper_Form_Element_Text('JLogo', NULL, NULL, _t('2. 站点 Logo 地址'), _t('在这里填入一个图片 URL 或 BASE64 地址，不填写会显示默认 Logo'));
    $form->addInput($JLogo);

    /* QQ */
    $JQQ = new Typecho_Widget_Helper_Form_Element_Text('JQQ', NULL, NULL, _t('3. 您的QQ'), _t('请填写QQ号，用于侧边栏展示'));
    $form->addInput($JQQ);

    /* 座右铭 */
    $JMotto = new Typecho_Widget_Helper_Form_Element_Text('JMotto', NULL, NULL, _t('4. 您的座右铭'), _t('请填写座右铭，用于侧边栏展示'));
    $form->addInput($JMotto);

    /* 天气KEY */
    $JWetherKey = new Typecho_Widget_Helper_Form_Element_Text('JWetherKey', NULL, NULL, _t('5. 天气KEY'), _t('请去官网申请，https://cj.weather.com.cn'));
    $form->addInput($JWetherKey);

    /* 音乐播放器歌单ID */
    $JMeting = new Typecho_Widget_Helper_Form_Element_Text('JMeting', NULL, NULL, _t('6. 音乐播放器歌单ID'), _t('请去网易云查看'));
    $form->addInput($JMeting);

    /* 侧边栏显示项 */
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'sidebarBlock',
        array(
            'ShowAboutAuthor' => _t('显示关于作者'),
            'ShowTodayWether' => _t('显示今日天气'),
            'Show3DTag' => _t('显示标签云'),
            'ShowReply' => _t('显示最近回复'),
            'ShowArticle' => _t('显示最新文章'),
            'ShowMeting' => _t('显示音乐播放器'),
            'ShowCursor' => _t('显示鼠标点击特效'),
        ),
        array('ShowAboutAuthor', 'ShowTodayWether', 'Show3DTag', 'ShowReply', 'ShowArticle', 'ShowMeting', 'ShowCursor'),
        _t('侧边栏显示')
    );
    $form->addInput($sidebarBlock->multiMode());
}
