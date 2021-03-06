<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?=$head['site_title']?><?if($head['page_title']):?> :: <?=$head['page_title']?><?endif?></title>
<meta name='description' content='<?=$head['meta_description']?>' />
<meta name='keywords' content='<?=$head['meta_keywords']?>' />

<meta name="robots" content="INDEX,FOLLOW" />

<!-- RSS --> 
<link type="application/rss+xml" href="<?=site_url($BC->_getBaseURL().'articles/RSS') ?>" title="Articles RSS Feed" rel="alternate" />

<!-- favicon -->
<link type="image/x-icon" href="<?=base_url().$BC->_getTheme()?>images/favicon.ico" rel="icon" />

<!-- CSS -->
<?//=include_minified('css/zero.css','css')?>
<?//=include_minified('css/dialog-cart.css','css')?>
<?=include_combined(array('css/zero.css','css/dialog-cart.css'),'css/combined.css','css')?>
<?=include_minified($BC->_getTheme().'css/styles.css','css')?>

<?if ( 
    preg_match('[/yak-kupiti\b]',$current_location_str) ||
    preg_match('[/kak-kupit\b]',$current_location_str) ||
    preg_match('[/products/index/category/1\b]',$current_location_str) ||
    preg_match('[/products/index/category/4\b]',$current_location_str)
):?>
    <?=include_minified($BC->_getTheme().'css/colors/orange.css','css')?>
<?endif?>

<?if ( 
    preg_match('[/faq\b]',$current_location_str) ||
    preg_match('[/products/index/category/3\b]',$current_location_str)
):?>
    <?=include_minified($BC->_getTheme().'css/colors/green.css','css')?>
<?endif?>

<?//=include_minified($BC->_getTheme().'css/poll.css','css')?>
<?//=include_minified($BC->_getTheme().'css/print.css','css','print')?>
<?=include_minified($BC->_getTheme().'css/poll.css','inline_css')?>
<?=include_minified($BC->_getTheme().'css/print.css','inline_css','print')?>
<?foreach ($BC->_getCSSFiles() as $css_file):?>
<?//=include_minified($css_file,'css')?>
<?=include_minified($css_file,'inline_css')?>
<?endforeach?>

<!-- Load JS -->
<?=load_inline_js('inc/js-jquery')?>
<?=load_inline_js('inc/js-jquery-ui')?>
<?=load_inline_js('inc/js-custom-functions')?>
<?=load_inline_js('inc/js-tooltip')?>
<?=load_inline_js('inc/js-IE-fix')?>

<?if($BC->_getController()=='products' && in_array($BC->_getMethod(),array('view','name'))):?>
<?=load_inline_js('inc/js-lightbox')?>
<?endif?>

<?=include_minified($BC->_getTheme().'js/imagepreloader.js','inline_js')?>

<!-- carousel -->
<?if ($BC->is_home_page()):?> 
<?=include_minified($BC->_getTheme().'css/jcarousel/tango/skin.css','css')?>
<?=include_js($BC->_getTheme().'js/jquery.jcarousel.min.js')?>
<script>
jQuery(document).ready(function() {
    jQuery('#products-carousel').jcarousel();
});
</script>
<?endif?>

<!-- Load Application Packages config -->
<?=include_js($BC->_getBaseURL().'app_js/config')?>

<?foreach ($BC->_getJSFiles() as $js_file):?>
<?//=include_js($js_file)?>
<?=inline_js($js_file)?>
<?endforeach?>

<?=include_minified($BC->_getFolder('js').'custom/request_call/send_form.js','inline_js')?>

<script>
preloadImages([
    '<?=base_url().$BC->_getTheme()?>images/menu-items-hover.png'
]);
</script>

<?=load_inline_js('inc/js-facebox'); ?>
