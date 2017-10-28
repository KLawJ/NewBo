<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
     public $css = [
        'css/site.css',
		'theme/bootstrap/css/bootstrap.min.css',
		'theme/dist/css/AdminLTE.min.css',
        '//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css',
        'theme/sliptree_bootstrap_tokendfield/dist/css/tokenfield-typeahead.css',
        'theme/sliptree_bootstrap_tokendfield/dist/css/bootstrap-tokenfield.css',
		'theme/dist/css/skins/_all-skins.min.css',
	     'theme/plugins/iCheck/flat/blue.css',
          'theme/plugins/morris/morris.css',
             'theme/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
              'theme/plugins/datepicker/datepicker3.css',
               'theme/plugins/daterangepicker/daterangepicker.css',
                'theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
               

    ];
    public $js = [
	
'theme/plugins/jQuery/jquery-2.2.3.min.js',
'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
'theme/sliptree_bootstrap_tokendfield/dist/bootstrap-tokenfield.js',
'theme/sliptree_bootstrap_tokendfield/docs-assets/js/typeahead.bundle.min.js',
'theme/bootstrap/js/bootstrap.min.js',
'theme/plugins/morris/morris.min.js',
'theme/plugins/sparkline/jquery.sparkline.min.js',
'theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
'theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
'theme/plugins/knob/jquery.knob.js',
'theme/plugins/daterangepicker/daterangepicker.js',
'theme/plugins/datepicker/bootstrap-datepicker.js',
'theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
'theme/plugins/slimScroll/jquery.slimscroll.min.js',
'theme/plugins/fastclick/fastclick.js',
'theme/dist/js/app.min.js',
'theme/dist/js/pages/dashboard.js',
'theme/dist/js/demo.js',
      
	
	
	
    ];
    public $depends = [
        
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
        
    ];
    //public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
   
}
