<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once("tools/url.php");
require_once("tools/tools.php");
function themeConfig($form)
{ ?>

    <link href="<?php echo theurl ?>assets/css/functions.min.css" rel="stylesheet" type="text/css" />
    <h1 class="j-title">公告</h1>
    <div class="j-notice">
        <?php
        $result = file_get_contents("https://api.vvhan.com/api/qqsc?key=1668901a8a41e2e9deaaaa3100ebd4ae");
        $data = json_decode($result, true);
        if ($data["title"] !== getVersion()) {
            echo "<h2>检测到版本更新！</h2>";
        }
        echo "<p>当前版本号：" . getVersion() . "</p>";
        echo "<p>最新版本号：" . $data["title"] . "</p>";
        echo $data["content"];
        ?>
    </div>
    <ul class="j-tab">
        <li data-show="j-global">
            <svg t="1600161921766" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M310.06 123c-96.67 0-175.27 78.77-175 175.5S215 473 311.75 473H441a43 43 0 0 0 43-43V298h1.06c0-96.5-78.51-175-175-175zM398 377a10 10 0 0 1-10 10h-76.81c-49 0-89.66-39.13-90.13-88.12A89 89 0 0 1 398 284.28zM482 567a43 43 0 0 0-43-43H309.75c-96.75 0-176.42 77.77-176.69 174.5s78.33 175.5 175 175.5c96.49 0 175-78.5 175-175H482z m-86 145.72a89 89 0 0 1-176.94-14.6c0.47-49 41.13-88.12 90.13-88.12H386a10 10 0 0 1 10 10zM712.25 524H583a43 43 0 0 0-43 43v132h-1.06c0 96.5 78.51 175 175 175 96.67 0 175.27-78.77 175-175.5S809 524 712.25 524z m1.69 264A89.14 89.14 0 0 1 626 712.72V620a10 10 0 0 1 10-10h76.81c49 0 89.66 39.13 90.13 88.12a89.1 89.1 0 0 1-89 89.88zM542 432a43 43 0 0 0 43 43h129.25c96.73 0 176.42-77.77 176.69-174.5S812.61 125 715.94 125c-96.49 0-175 78.5-175 175H542z m86-145.72a89 89 0 0 1 176.94 14.6c-0.47 49-41.13 88.12-90.13 88.12H638a10 10 0 0 1-10-10z" p-id="2287"></path>
            </svg>
            <span>全局设置</span>
        </li>
        <li data-show="j-aside">
            <svg t="1600161921766" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M310.06 123c-96.67 0-175.27 78.77-175 175.5S215 473 311.75 473H441a43 43 0 0 0 43-43V298h1.06c0-96.5-78.51-175-175-175zM398 377a10 10 0 0 1-10 10h-76.81c-49 0-89.66-39.13-90.13-88.12A89 89 0 0 1 398 284.28zM482 567a43 43 0 0 0-43-43H309.75c-96.75 0-176.42 77.77-176.69 174.5s78.33 175.5 175 175.5c96.49 0 175-78.5 175-175H482z m-86 145.72a89 89 0 0 1-176.94-14.6c0.47-49 41.13-88.12 90.13-88.12H386a10 10 0 0 1 10 10zM712.25 524H583a43 43 0 0 0-43 43v132h-1.06c0 96.5 78.51 175 175 175 96.67 0 175.27-78.77 175-175.5S809 524 712.25 524z m1.69 264A89.14 89.14 0 0 1 626 712.72V620a10 10 0 0 1 10-10h76.81c49 0 89.66 39.13 90.13 88.12a89.1 89.1 0 0 1-89 89.88zM542 432a43 43 0 0 0 43 43h129.25c96.73 0 176.42-77.77 176.69-174.5S812.61 125 715.94 125c-96.49 0-175 78.5-175 175H542z m86-145.72a89 89 0 0 1 176.94 14.6c-0.47 49-41.13 88.12-90.13 88.12H638a10 10 0 0 1-10-10z" p-id="2287"></path>
            </svg>
            <span>侧边栏设置</span>
        </li>
        <li data-show="j-index">
            <svg t="1600161921766" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M310.06 123c-96.67 0-175.27 78.77-175 175.5S215 473 311.75 473H441a43 43 0 0 0 43-43V298h1.06c0-96.5-78.51-175-175-175zM398 377a10 10 0 0 1-10 10h-76.81c-49 0-89.66-39.13-90.13-88.12A89 89 0 0 1 398 284.28zM482 567a43 43 0 0 0-43-43H309.75c-96.75 0-176.42 77.77-176.69 174.5s78.33 175.5 175 175.5c96.49 0 175-78.5 175-175H482z m-86 145.72a89 89 0 0 1-176.94-14.6c0.47-49 41.13-88.12 90.13-88.12H386a10 10 0 0 1 10 10zM712.25 524H583a43 43 0 0 0-43 43v132h-1.06c0 96.5 78.51 175 175 175 96.67 0 175.27-78.77 175-175.5S809 524 712.25 524z m1.69 264A89.14 89.14 0 0 1 626 712.72V620a10 10 0 0 1 10-10h76.81c49 0 89.66 39.13 90.13 88.12a89.1 89.1 0 0 1-89 89.88zM542 432a43 43 0 0 0 43 43h129.25c96.73 0 176.42-77.77 176.69-174.5S812.61 125 715.94 125c-96.49 0-175 78.5-175 175H542z m86-145.72a89 89 0 0 1 176.94 14.6c-0.47 49-41.13 88.12-90.13 88.12H638a10 10 0 0 1-10-10z" p-id="2287"></path>
            </svg>
            <span>首页设置</span>
        </li>
        <li data-show="j-post">
            <svg t="1600161921766" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <path d="M310.06 123c-96.67 0-175.27 78.77-175 175.5S215 473 311.75 473H441a43 43 0 0 0 43-43V298h1.06c0-96.5-78.51-175-175-175zM398 377a10 10 0 0 1-10 10h-76.81c-49 0-89.66-39.13-90.13-88.12A89 89 0 0 1 398 284.28zM482 567a43 43 0 0 0-43-43H309.75c-96.75 0-176.42 77.77-176.69 174.5s78.33 175.5 175 175.5c96.49 0 175-78.5 175-175H482z m-86 145.72a89 89 0 0 1-176.94-14.6c0.47-49 41.13-88.12 90.13-88.12H386a10 10 0 0 1 10 10zM712.25 524H583a43 43 0 0 0-43 43v132h-1.06c0 96.5 78.51 175 175 175 96.67 0 175.27-78.77 175-175.5S809 524 712.25 524z m1.69 264A89.14 89.14 0 0 1 626 712.72V620a10 10 0 0 1 10-10h76.81c49 0 89.66 39.13 90.13 88.12a89.1 89.1 0 0 1-89 89.88zM542 432a43 43 0 0 0 43 43h129.25c96.73 0 176.42-77.77 176.69-174.5S812.61 125 715.94 125c-96.49 0-175 78.5-175 175H542z m86-145.72a89 89 0 0 1 176.94 14.6c-0.47 49-41.13 88.12-90.13 88.12H638a10 10 0 0 1-10-10z" p-id="2287"></path>
            </svg>
            <span>文章页设置</span>
        </li>
    </ul>

    <script src="//cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo theurl ?>assets/js/functions.js"></script>


<?php

    $JFavicon = new Typecho_Widget_Helper_Form_Element_Textarea('JFavicon', NULL, NULL, _t('1. 自定义Favicon（非必填）'), _t('介绍：用于修改网站的Favicon图标（不知道是什么可以百度）。格式要求：URL 或 Base64'));
    $JFavicon->setAttribute('class', 'j-content j-global');
    $form->addInput($JFavicon);


    $JLogo = new Typecho_Widget_Helper_Form_Element_Textarea('JLogo', NULL, NULL, _t('2. 自定义Logo（非必填）'), _t('介绍：用于修改网站顶部状态栏的 Logo 图标。格式要求：URL 或 Base64'));
    $JLogo->setAttribute('class', 'j-content j-global');
    $form->addInput($JLogo);


    $JBanQuan = new Typecho_Widget_Helper_Form_Element_Textarea('JBanQuan', NULL, NULL, _t('3. 自定义底部版权文字（非必填）'), _t('介绍：用于修改网页最底部左侧的版权信息，字数请勿过多，内容随意。例如：备案信息xxxx'));
    $JBanQuan->setAttribute('class', 'j-content j-global');
    $form->addInput($JBanQuan);


    $JBanQuanLinks = new Typecho_Widget_Helper_Form_Element_Textarea('JBanQuanLinks', NULL, NULL, _t('4. 自定义底部右侧链接（非必填）'), _t('介绍：用于修改网页最底部右侧的链接信息。要求：a标签格式。例如：&lt;a href="/"&gt;首页&lt;/a&gt; &lt;a href="/"&gt;关于&lt;/a&gt;'));
    $JBanQuanLinks->setAttribute('class', 'j-content j-global');
    $form->addInput($JBanQuanLinks);

    /* 全局窗口控制 */
    $JWindowBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'JWindowBlock',
        array(
            'ShowHeaderScroll' => _t('开启 / 关闭 —— 顶部状态栏跟随页面上下滚动'),
            'ShowLoginButton' => _t('开启 / 关闭 —— 顶部状态栏的登录按钮'),
            'ShowCensusButton' => _t('开启 / 关闭 —— 顶部状态栏的统计按钮'),
            'ShowBarrager' => _t('开启 / 关闭 —— 全局弹幕功能（强烈建议开启！页面更加丰富！）'),
            'ShowColorTheme' => _t('开启 / 关闭 —— 用户前台自定主题（强烈建议开启！交互效果更佳！）'),
            'ShowBackTop' => _t('开启 / 关闭 —— 页面内容过长时是否显示 "返回顶部" 按钮'),
            'ShowProgressBar' => _t('开启 / 关闭 —— 顶部状态上的页面进度条'),
            'ShowContextMenu' => _t('开启 / 关闭 —— 鼠标右键禁止点击，开启后鼠标右键将无作用'),
            'ShowCountTime' => _t('开启 / 关闭 —— 页面最底部的计时器功能'),
            'ShowAPlayer' => _t('开启 / 关闭 —— 音乐播放器（可以在下方配置您的网抑云ID，也可以修改代码设置成QQ音乐平台等）'),
            'ShowConsole' => _t('开启 / 关闭 —— 代码防偷功能（可有效防止别人调试偷代码，提示内容请在console.html里面自行修改）'),
            'ShowPageLoad' => _t('开启 / 关闭 —— 页面加载动画（加载动画一般在网络较慢的情况下显示，正常情况下网页都是秒开）'),
        ),
        array('ShowHeaderScroll', 'ShowLoginButton', 'ShowCensusButton', 'ShowBarrager', 'ShowColorTheme', 'ShowBackTop', 'ShowProgressBar', 'ShowContextMenu', 'ShowCountTime', 'ShowConsole', 'ShowPageLoad'),
        _t('5. 全局窗口类控制')
    );
    $JWindowBlock->setAttribute('class', 'j-content j-global');
    $form->addInput($JWindowBlock->multiMode());

    $JMeting = new Typecho_Widget_Helper_Form_Element_Text('JMeting', NULL, NULL, _t('5-1. 网抑云的歌单ID'), _t('介绍：网抑云的上https://music.163.com/登陆自己的号找一个喜欢的歌单，复制地址栏上面的ID，例如149232428'));
    $JMeting->setAttribute('class', 'j-content j-global');
    $form->addInput($JMeting);

    $JDocumentTitle = new Typecho_Widget_Helper_Form_Element_Text('JDocumentTitle', NULL, NULL, _t('5-2. 网页被隐藏时显示的标题（非必填）'), _t('介绍：在PC端切换网页标签时，网站标题显示的内容。如果不填写，则默认不开启'));
    $JDocumentTitle->setAttribute('class', 'j-content j-global');
    $form->addInput($JDocumentTitle);

    /* 选择live2D人物 */
    $JLive2D = new Typecho_Widget_Helper_Form_Element_Select(
        'JLive2D',
        array(
            'close' => _t('关闭（默认）'),
            'https://unpkg.com/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json' => _t('小可爱（女）'),
            'https://unpkg.com/live2d-widget-model-haruto@1.0.5/assets/haruto.model.json' => _t('小可爱（男）'),
            'https://unpkg.com/live2d-widget-model-miku@1.0.5/assets/miku.model.json' => _t('初音'),
            'https://unpkg.com/live2d-widget-model-shizuku@1.0.5/assets/shizuku.model.json' => _t('萌娘'),
            'https://unpkg.com/live2d-widget-model-chitose@1.0.5/assets/chitose.model.json' => _t('小帅哥')
        ),
        'close',
        _t('5-3. 选择Live2D人物模型（开启后会在左下角显示一个小人，该功能采用远程调用不会消耗性能）')
    );
    $JLive2D->setAttribute('class', 'j-content j-global');
    $form->addInput($JLive2D->multiMode());


    $JDocumentPCBG = new Typecho_Widget_Helper_Form_Element_Text('JDocumentPCBG', NULL, NULL, _t('6. PC端网站背景图片（非必填）'), _t('若您想使用自定义图片，请先关闭下方的canvas背景，否则该项不会起作用。介绍：PC端网站的背景图片，不填写时显示默认的灰色。填写时请填写图片地址 或 随机图片api 例如：http://api.btstu.cn/sjbz/?lx=dongman'));
    $JDocumentPCBG->setAttribute('class', 'j-content j-global');
    $form->addInput($JDocumentPCBG);

    $JDocumentWAPBG = new Typecho_Widget_Helper_Form_Element_Text('JDocumentWAPBG', NULL, NULL, _t('7. WAP端网站背景图片（非必填）'), _t('若您想使用自定义图片，请先关闭下方的canvas背景，否则该项不会起作用。介绍：WAP端网站的背景图片，不填写时显示默认的灰色。填写时请填写图片地址 或 随机图片api 例如：http://api.btstu.cn/sjbz/?lx=m_dongman'));
    $JDocumentWAPBG->setAttribute('class', 'j-content j-global');
    $form->addInput($JDocumentWAPBG);

    /* 背景图 */
    $JCanvasType = new Typecho_Widget_Helper_Form_Element_Select(
        'JCanvasType',
        array(
            'close' => _t('关闭（默认）'),
            'background1.min.js' => _t('效果1-线状'),
        ),
        'close',
        _t('8. 选择canvas背景图（开启后上方设置的背景图片将失效，并且该项是影响性能的！）')
    );
    $JCanvasType->setAttribute('class', 'j-content j-global');
    $form->addInput($JCanvasType->multiMode());

    /* 鼠标特效类型 */
    $JCursorType = new Typecho_Widget_Helper_Form_Element_Select(
        'JCursorType',
        array(
            'close' => _t('关闭（默认）'),
            'cursor1.min.js' => _t('烟花效果'),
            'cursor2.min.js' => _t('气泡效果'),
            'cursor3.min.js' => _t('富强、民主、和谐...'),
            'cursor4.min.js' => _t('彩色爱心'),
        ),
        'close',
        _t('9. 选择鼠标点击特效（上面开启了鼠标点击特效后，该项才会生效）')
    );
    $JCursorType->setAttribute('class', 'j-content j-global');
    $form->addInput($JCursorType->multiMode());

    $JGlobalTheme = new Typecho_Widget_Helper_Form_Element_Text('JGlobalTheme', NULL, NULL, _t('10. 网站默认主题色（非必填，填写时请务必按格式填写正确！例如：#ff6800）'), _t('介绍：用户第一次进入页面，或者是在前台没有选择过颜色时候的默认主题色，格式要求：颜色值（例如：#ff6800），若填写请务必按照格式填写，否则会导致网站主题色无法显示！！！'));
    $JGlobalTheme->setAttribute('class', 'j-content j-global');
    $form->addInput($JGlobalTheme);



    /* 侧边栏控制 */
    $JAsideBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'JAsideBlock',
        array(
            'ShowAsideAuthor' => _t('开启 / 关闭 —— 作者信息（后期会增加两种风格的作者信息）'),
            'ShowAsideWether' => _t('开启 / 关闭 —— 天气信息（开启后务必在下方天气设置处填写KEY值！！！否则天气无法正常显示）'),
            'ShowAsideReply' => _t('开启/关闭 —— 最新回复'),
            'ShowAsideReplyScroll' => _t('开启/关闭 —— 最新回复列表无缝滚动'),
            'ShowAside3DTag' => _t('开启/关闭 —— 3D标签云'),
            'ShowAsideHot' => _t('开启/关闭 —— 热门文章（可以在下方选择显示的个数，默认显示3条）')
        ),
        array('ShowAsideAuthor', 'ShowAsideWether', 'ShowAsideReply', 'ShowAside3DTag', 'ShowAsideHot', 'ShowAsideReplyScroll'),
        _t('1. 侧边栏控制')
    );
    $JAsideBlock->setAttribute('class', 'j-content j-aside');
    $form->addInput($JAsideBlock->multiMode());

    $JQQ = new Typecho_Widget_Helper_Form_Element_Text('JQQ', NULL, NULL, _t('2-1. 作者信息 —— 作者QQ（非必填）'), _t('请填写正确的QQ号码，如果不写则默认显示主题开发者的QQ：2323333339'));
    $JQQ->setAttribute('class', 'j-content j-aside');
    $form->addInput($JQQ);

    $JQQLink = new Typecho_Widget_Helper_Form_Element_Text('JQQLink', NULL, NULL, _t('2-1. 作者信息 —— 点击昵称跳转链接（非必填）'), _t('请填写URL地址，如果不填写则默认跳转到联系QQ'));
    $JQQLink->setAttribute('class', 'j-content j-aside');
    $form->addInput($JQQLink);


    $JMotto = new Typecho_Widget_Helper_Form_Element_Text('JMotto', NULL, NULL, _t('2-2. 作者信息 —— 座右铭（非必填）'), _t('请填写一个座右铭或激励的文案，字数建议控制在15字以内'));
    $JMotto->setAttribute('class', 'j-content j-aside');
    $form->addInput($JMotto);


    $JWetherKey = new Typecho_Widget_Helper_Form_Element_Text('JWetherKey', NULL, NULL, _t('3-3. 天气的KEY值（开启天气，必须填写此项！）'), _t('如果关闭天气选项请忽略，开启天气如果不填写会显示不了！！！免费申请地址：<a href="//cj.weather.com.cn">cj.weather.com.cn</a>'));
    $JWetherKey->setAttribute('class', 'j-content j-aside');
    $form->addInput($JWetherKey);


    $JADContent1 = new Typecho_Widget_Helper_Form_Element_Text('JADContent1', NULL, NULL, _t('4-1. 广告1 —— 图片地址（非必填）'), _t('如果不写，则代表不显示这个广告'));
    $JADContent1->setAttribute('class', 'j-content j-aside');
    $form->addInput($JADContent1);


    $JADContent1Link = new Typecho_Widget_Helper_Form_Element_Text('JADContent1Link', NULL, NULL, _t('4-2. 广告1 —— 跳转地址（非必填）'), _t('请填写广告1的跳转链接'));
    $JADContent1Link->setAttribute('class', 'j-content j-aside');
    $form->addInput($JADContent1Link);


    $JADContent2 = new Typecho_Widget_Helper_Form_Element_Text('JADContent2', NULL, NULL, _t('5-1. 广告2 —— 图片地址（非必填）'), _t('如果不写，则代表不显示这个广告'));
    $JADContent2->setAttribute('class', 'j-content j-aside');
    $form->addInput($JADContent2);


    $JADContent2Link = new Typecho_Widget_Helper_Form_Element_Text('JADContent2Link', NULL, NULL, _t('5-2. 广告2 —— 跳转地址（非必填）'), _t('请填写广告2的跳转链接'));
    $JADContent2Link->setAttribute('class', 'j-content j-aside');
    $form->addInput($JADContent2Link);



    /* 选择热门文章显示的个数 */
    $JAsideReplyNum = new Typecho_Widget_Helper_Form_Element_Select(
        'JAsideReplyNum',
        array(
            '3' => _t('默认3条'),
            '4' => _t('4条'),
            '5' => _t('5条'),
            '6' => _t('6条'),
            '7' => _t('7条'),
            '8' => _t('8条'),
            '9' => _t('9条'),
            '10' => _t('10条'),
        ),
        '3',
        _t('6-1. 选择热门文章显示的个数')
    );
    $JAsideReplyNum->setAttribute('class', 'j-content j-aside');
    $form->addInput($JAsideReplyNum->multiMode());



    /* 首页控制 */
    $JIndexBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'JIndexBlock',
        array(
            'ShowIndexHot' => _t('开启 / 关闭 —— 热门文章（介绍：开启后首页会显示浏览量最多的4篇文章）'),
        ),
        array('ShowIndexHot'),
        _t('1. 首页控制')
    );
    $JIndexBlock->setAttribute('class', 'j-content j-index');
    $form->addInput($JIndexBlock->multiMode());


    $JIndexNotice = new Typecho_Widget_Helper_Form_Element_Text('JIndexNotice', NULL, NULL, _t('2-1. 首页公告文字（非必填）'), _t('如果不填写这项，则不显示公告'));
    $JIndexNotice->setAttribute('class', 'j-content j-index');
    $form->addInput($JIndexNotice);

    $JIndexNoticeLink = new Typecho_Widget_Helper_Form_Element_Text('JIndexNoticeLink', NULL, NULL, _t('2-2. 首页公告链接（非必填）'), _t('点击公告后的url跳转链接'));
    $JIndexNoticeLink->setAttribute('class', 'j-content j-index');
    $form->addInput($JIndexNoticeLink);

    $JIndexAD = new Typecho_Widget_Helper_Form_Element_Text('JIndexAD', NULL, NULL, _t('3-1. 首页广告图（非必填）'), _t('如果不填写这项，则不显示广告图片'));
    $JIndexAD->setAttribute('class', 'j-content j-index');
    $form->addInput($JIndexAD);

    $JIndexADLink = new Typecho_Widget_Helper_Form_Element_Text('JIndexADLink', NULL, NULL, _t('3-2. 首页广告跳转链接（非必填）'), _t('点击广告后的url跳转链接'));
    $JIndexADLink->setAttribute('class', 'j-content j-index');
    $form->addInput($JIndexADLink);

    /* 文章页控制 */
    $JPostBlock = new Typecho_Widget_Helper_Form_Element_Checkbox(
        'JPostBlock',
        array(
            'ShowPostBread' => _t('开启 / 关闭 —— 面包屑导航（介绍：文章页面上方的导航。例如：首页 / 前端 / vue）'),
            'ShowPostCounting' => _t('开启 / 关闭 —— 文章统计信息（介绍：用于显示当前文章的信息。例如时间阅读量发布日期等）'),
            'ShowPostBanQuan' => _t('开启 / 关闭 —— 文章版权信息（介绍：用于显示本篇文章的版权信息，位置在文章的末尾处）'),
            'ShowPostRelevant' => _t('开启 / 关闭 —— 相关推荐（介绍：无论开启还是关闭，如果没有相关文章的话，默认不显示）'),
        ),
        array('ShowPostBread', 'ShowPostCounting', 'ShowPostBanQuan', 'ShowPostRelevant'),
        _t('1. 文章页控制')
    );
    $JPostBlock->setAttribute('class', 'j-content j-post');
    $form->addInput($JPostBlock->multiMode());
}
