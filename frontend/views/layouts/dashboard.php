<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$own_id="0";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">


   <link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" rel="stylesheet">
    <!-- Bootstrap styling for Typeahead -->
    <link href="./theme/sliptree_bootstrap_tokendfield/dist/css/tokenfield-typeahead.css" type="text/css" rel="stylesheet">
    <!-- Tokenfield CSS -->
    <link href="./theme/sliptree_bootstrap_tokendfield/dist/css/bootstrap-tokenfield.css" type="text/css" rel="stylesheet">



  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>


<div class="wrapper">

  <?php  include "header.php";   ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php  if (!Yii::$app->user->isGuest) {    ?>
  <?php include 'nav.php';  ?>
<?php  }    ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php';  ?>

  <!-- Control Sidebar -->
  <?php include 'setting.php'; ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
 <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  
   


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>





<script type="text/javascript">


 

$('#m_save').click(function(e){
      
       var id= $('#cross-case_id').val();
       TagJudgement(id);
       $('#modal-default').modal('hide');

     });


 
     $("#btn2").click(function(e){

      var ID = $('#tblcases-strjudges_value').val();
      var sd=$('#tblcases-case_id').val();
      var judge_class=$('#tblcases-strjudges_class').val();
       $.ajax({
            type:'POST',
            url:'index.php?r=cases/judge',
            data:{'id':ID,'sd':sd,'jcl':judge_class},
            success:function(html){
                
                $('.append_list').append(html);
            }
        }); 
    });
     
     $('#citation_id').change(function(){
      var citation_id =$(this).val();
      $.get('index.php?r=cases/citation_category',
      {citation:citation_id},
      function(data){
      $('#citation_category').html(data);
      });
    });
      
         $("#btn3").click(function(e){
    
      var ID = $('#citation_id').val();
      var sd=$('#tblcases-case_id').val();
      var year=$('#year').val();
      var page_number=$('#page_number').val();
      var volume=$('#volume').val();
      var casenumber=$('#case_number').val();
       
       $.ajax({
            type:'POST',
            url:'index.php?r=cases/citation',
            data:{'id':ID,'sd':sd,'year':year,'page_number':page_number,'volume':volume,'case_number':casenumber},
            success:function(html){
                
                $('.append_list_c').append(html);
            }
        }); 
    });
  $("#btn4").click(function(e){
    
      var cit = $('#tblcases-strreferredcitation').val();
     var sd=$('#tblcases-case_id').val();
     
       
       $.ajax({
            type:'POST',
            url:'index.php?r=cases/refcitation',
            data:{'cit':cit,'sd':sd,},
            success:function(html){
                
                $('.append_list_cr').append(html);
            }
        }); 
    });


  $( function() {
  
  	$('#add_case_no').click(function(){
    var sd=$('#tblcases-case_id').val();
    var case_no=$('#prefix_content').val()+" No. "+$('#tblcases-vol').val()+" of "+$('#tblcases-year').val();
     $.ajax({
            type:'POST',
            url:'index.php?r=cases/caseno',
            data:{'case_no':case_no,'sd':sd},
            success:function(html){
                
                $('.append_list_case_no').append(html);
            }
        }); 
  });
  
  
var case_no="";
    $("#myModal").on("show.bs.modal", function(e) {
    var link = $(e.relatedTarget);
    $(this).find(".modal-content").load(link.attr("href"));
}); 
	$('#tblcases-year').change(function(){
    var bool=$('#multiple_case_no').prop('checked');
   
     case_no="";
if (bool==true)  {

case_no=$('#tblcases-case_no').val()+";";
case_no= case_no +$('#prefix_content').val()+" No. "+$('#tblcases-vol').val()+" of "+$('#tblcases-year').val();;
}
    else   
    {
     case_no="";
    case_no=$('#prefix_content').val()+" No. "+$('#tblcases-vol').val()+" of "+$('#tblcases-year').val();
    }
  
$('#tblcases-case_no').val(case_no);
  });
var ownd=0;
  var subject,sub;
    	$('#icoheadnotesection-subject_id').keypress(function(){
   
         
     $('.subject_auto').autocomplete({
   source: "index.php?r=hsect/subject_autocomplete", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#icoheadnotesection-subject_id").val(ui.item.label);
                           $("#icoheadnotesection-hsubject_id").val(ui.item.value);
                           subject=ui.item.value;
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#icoheadnotesection-subject_id").val(ui.item.label);
                     $("#icoheadnotesection-hsubject_id").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   
 
 
});
     }); 
        
        
        $('#icoheadnotesection-section_id').keypress    (function(){
            
     $('.section_auto').autocomplete({
   source: "index.php?r=hsect/section_autocomplete", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#icoheadnotesection-section_id").val(ui.item.label);
                           $("#icoheadnotesection-hsection_id").val(ui.item.value);
                 sub=ui.item.value;
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#icoheadnotesection-section_id").val(ui.item.label);
                     $("#icoheadnotesection-hsection_id").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   
  
});


        });

 $("#icoheadnotesection-value_1").keypress(function(e){
         subject=$("#icoheadnotesection-hsubject_id").val();
          sub=$("#icoheadnotesection-hsection_id").val();
     $('.auto1').autocomplete( {
   source: "index.php?r=hsect/autocomplete&ownd=0&subj=" + subject +"&sub=" +sub, 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#icoheadnotesection-value_1").val(ui.item.label);
                           $("#icoheadnotesection-hvalue_1").val(ui.item.id);
                          ownd=ui.item.id;
                           console.log("selected id: ", ui.item.label);
                           

                    }, 
                            focus: function( event, ui ) {
                     $("#icoheadnotesection-value_1").val(ui.item.label);
                     $("#icoheadnotesection-hvalue_1").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   

});

     }); 

 $("#icoheadnotesection-value_2").keypress(function(e){
             ownd=$("#icoheadnotesection-hvalue_1").val();  
     $('.auto2'). autocomplete( {
   source: "index.php?r=hsect/autocomplete&ownd="+ ownd+"&subj=0&sub=0", 
                 select: function (event, ui) {
                         event.preventDefault();
                           $("#icoheadnotesection-value_2").val(ui.item.label);
                             $("#icoheadnotesection-hvalue_2").val(ui.item.value);
                             ownd=ui.item.id;
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#icoheadnotesection-value_2").val(ui.item.label);
                     $("#icoheadnotesection-hvalue_2").val(ui.item.value);
                             ownd=ui.item.id;
                   
                 
                  },
		minLength: 1
 
});
     });

 $("#icoheadnotesection-value_3").keypress(function(e){
            ownd=$("#icoheadnotesection-hvalue_2").val();
        
     $('.auto3'). autocomplete( {
   source: "index.php?r=hsect/autocomplete&ownd="+ownd+"&subj=0&sub=0", 
                 select: function (event, ui) {
                         event.preventDefault();
                           $("#icoheadnotesection-value_3").val(ui.item.label);
                             $("#icoheadnotesection-hvalue_3").val(ui.item.value);
                             ownd=0;
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#icoheadnotesection-value_3").val(ui.item.label);
                     $("#icoheadnotesection-hvalue_3").val(ui.item.value);
                    ownd=0;
                 
                  },
		minLength: 1
   
});
     });



 	$('#icosubcontents-subject_id').keypress(function(){
   
         
     $('.subject_auto1'). autocomplete( {
   source: "index.php?r=hsect/subject_autocomplete", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#icosubcontents-subject_id").val(ui.item.label);
                           $("#icosubcontents-hsubject_id").val(ui.item.value);
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#icosubcontents-subject_id").val(ui.item.label);
                     $("#icosubcontents-hsubject_id").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   
 
});
     }); 
        
        
        $('#icosubcontents-subs_id').keypress    (function(){
            
     $('.section_auto1').autocomplete( {
   source: "index.php?r=hsect/section_autocomplete", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#icosubcontents-subs_id").val(ui.item.label);
                           $("#icosubcontents-hsection_id").val(ui.item.value);
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#icosubcontents-subs_id").val(ui.item.label);
                     $("#icosubcontents-hsection_id").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   

});


        });

 $("#icosubcontents-value_1").keypress(function(e){
         
     $('.sauto1').autocomplete( {
   source: "index.php?r=hsect/autocomplete&ownd=0&subj=" + $("#icosubcontents-hsubject_id").val() +"&sub=" + $("#icosubcontents-hsection_id").val(), 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#icosubcontents-value_1").val(ui.item.label);
                           $("#icosubcontents-hvalue_1").val(ui.item.value);
                          ownd=ui.item.id;
                           console.log("selected id: ", ui.item.label);
                           

                    }, 
                            focus: function( event, ui ) {
                     $("#icosubcontents-value_1").val(ui.item.label);
                     $("#icosubcontents-hvalue_1").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   
 
});

     }); 

 $("#icosubcontents-value_2").keypress(function(e){
      ownd=    $("#icosubcontents-hvalue_1").val();
     $('.sauto2'). autocomplete( {
   source: "index.php?r=hsect/autocomplete&ownd="+ ownd+"&subj=0&sub=0", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#icosubcontents-value_2").val(ui.item.label);
                             $("#icosubcontents-hvalue_2").val(ui.item.value);
                             ownd=ui.item.id;
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#icosubcontents-value_2").val(ui.item.label);
                     $("#icosubcontents-hvalue_2").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   
 
});
     });

 $("#icosubcontents-value_3").keypress(function(e){
       ownd=    $("#icosubcontents-hvalue_2").val();    
     $('.sauto3').autocomplete( {
   source: "index.php?r=hsect/autocomplete&ownd="+ ownd+"&subj=0&sub=0", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#icosubcontents-value_3").val(ui.item.label);
                             $("#icosubcontents-hvalue_3").val(ui.item.value);
                             ownd=ui.item.id;
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#icosubcontents-value_3").val(ui.item.label);
                     $("#icosubcontents-hvalue_3").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   

});
     });
  
   $("#tblcases-strjudges").keypress(function(e){
         
     $('.auto_judge').autocomplete( {
   source: "index.php?r=cases/judgeautocomplete", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#tblcases-strjudges").val(ui.item.label);
                             $("#tblcases-strjudges_value").val(ui.item.value);
                             ownd=ui.item.id;
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#tblcases-strjudges").val(ui.item.label);
                     $("#tblcases-strjudges_value").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   

});
     });

 $("#tblcases-strreferredcitation").keypress(function(e){
         
     $('.cit_auto').tokenfield({
  autocomplete: {
   source: "index.php?r=cases/citationautocomplete", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#tblcases-strreferredcitation").val(ui.item.label);
                             $("tblcases-strreferredcitation").val(ui.item.label);
                             ownd=ui.item.id;
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("tblcases-strreferredcitation").val(ui.item.label);
                     $("tblcases-strreferredcitation").val(ui.item.label);
                   
                 
                  },
		minLength: 1
   
  },
  showAutocompleteOnFocus: false,
     delimiter: ',',
beautify: true,
     	inputType: 'text'
});
 
     });

  $("#cross-citation").keypress(function(e){
         
     $('.cita_auto').tokenfield({
  autocomplete: {
   source: "index.php?r=cases/citautocomplete", 
                 select: function (event, ui) {
                          event.preventDefault();
                           $("#cross-citation").val(ui.item.label);
                             $("#cross-case_id").val(ui.item.value);
                            
                           console.log("selected id: ", ui.item.label);

                    }, 
                            focus: function( event, ui ) {
                     $("#cross-citation").val(ui.item.label);
                     $("#cross-case_id").val(ui.item.value);
                   
                 
                  },
		minLength: 1
   
  },
  showAutocompleteOnFocus: true
});
     });

    } );

  


      
    	

</script>
<!-- Morris.js charts -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>

<!-- CK Editor -->
<script type="text/javascript" src="./theme/plugins/ckeditor/ckeditor.js"></script> 
<!-- <script type="text/javascript" src="./theme/plugins/ckeditor/ckeditor.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<script>

 //Date picker
    $('#tblcases-judgement_dt').datepicker({
    
      dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true,
         ignoreReadonly: true,
            maxDate: 'now',
    yearRange: '1800:2020',
      autoclose: true
    });
     $('#fromDate').datepicker({
       dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true,
         ignoreReadonly: true,
            maxDate: 'now',
      yearRange: '1800:2020',
      autoclose: true
    });
     $('#toDate').datepicker({
       dateFormat: "dd/mm/yy",
            changeMonth: true,
            changeYear: true,
         ignoreReadonly: true,
            maxDate: 'now',
      yearRange: '1800:2020',
      autoclose: true
    });
$(".editor").each(function(){
      CKEDITOR.replace(this);
});

   
	

</script>   
<script type="text/javascript" >
 


    /*-------------------------------------------------------------------------------------*/
    function IndentPara(theSelectedText){
        var myEditor_i = CKEDITOR.instances.judgement_content;
        var FormattedText_i = '<blockquote>' + theSelectedText + '</blockquote>';
        myEditor_i.insertHtml(FormattedText_i);
    }
    function InsertHTML(theSelectedText){

    
       // document.forms[0].selectedtext.value = theSelectedText;
        if(theSelectedText==''){
            alert('Please select text in the Judgement before you want to connect this to other judgement(s)');
            return false;
        }else{
            $("#cross-selected_text").val(theSelectedText);
       $('#modal-default').modal('toggle');

            // $('<a href="list-judgements.php?string='+escape(theSelectedText)+'"></a>').fancybox({overlayShow: true,
            //     'hideOnContentClick': false
            // }).click();
        }
    }
    function TagJudgement(case_id){

        for ( var i in CKEDITOR.instances ){
   var currentInstance = i;
   break;
}
var myEditor   = CKEDITOR.instances[currentInstance];
     //   var myEditor = CKEDITOR.instances.TblCases.judgement_content;
        var FormattedText = '<a href="index.php?r=cases/cross_view&id='+case_id+'">'+ $("#cross-selected_text").val()+'</a>';
       
        myEditor.insertHtml(FormattedText);
    }
    /*-------------------------------------------------------------------------------------*/
    function ACTSInsertHTML(theSelectedText){
        document.forms[0].selectedACTtext.value = theSelectedText;
        if(theSelectedText==''){
            alert('Please select text in the Judgement before you want to connect ACTS');
            return false;
        }else{
            $('<a href="list-acts.php?string='+escape(theSelectedText)+'"></a>').fancybox({overlayShow: true,
                'hideOnContentClick': false
            }).click();
        }
    }
    function TagAct(actid){
        var myEditor = CKEDITOR.instances.judgement_content;
        var FormattedText = '<a style="font-size:16px" href="javascript:showAct('+actid+');">' + document.forms[0].selectedACTtext.value+'</a>';
        myEditor.insertHtml(FormattedText);
    }
    /*-------------------------------------------------------------------------------------*/
    function ACTSECTIONInsertHTML(theSelectedText){
        document.forms[0].selectedACTtext.value = theSelectedText;
        if(theSelectedText==''){
            alert('Please select text in the Judgement before you want to connect ACTS');
            return false;
        }else{
            $('<a href="list-sections.php?string='+escape(theSelectedText)+'"></a>').fancybox({overlayShow: true,
                'hideOnContentClick': false
            }).click();
        }
    }
    function TagSections(sectionid){
        var myEditor = CKEDITOR.instances.judgement_content;
        //var FormattedText = '<a href="#" title="ajax:bubble-section.php?id='+sectionid+'" >' + document.forms[0].selectedACTtext.value+'</a>';
        var FormattedText = '<a href="javascript:ShowSection('+sectionid+')">' + document.forms[0].selectedACTtext.value+'</a>';
        myEditor.insertHtml(FormattedText);
    }
    /*-------------------------------------------------------------------------------------*/






    /*-------------------------------------------------------------------------------------*/
    function HInsertHTML(theSelectedText){
        document.forms[0].selectedtext.value = theSelectedText;
        if(theSelectedText==''){
            alert('Please select text in the Judgement before you want to connect this to other judgement(s)');
            return false;
        }else{
            $('<a href="Hlist-judgements.php?string='+escape(theSelectedText)+'"></a>').fancybox({overlayShow: true,
                'hideOnContentClick': false
            }).click();
        }
    }
    function HTagJudgement(case_id){
        var myEditor = CKEDITOR.instances.headnote;
        var FormattedText = '<a href="javascript:showJudgement('+case_id+');">'+document.forms[0].selectedtext.value+'</a>';
        myEditor.insertHtml(FormattedText);
    }
    /*-------------------------------------------------------------------------------------*/
    function HACTSInsertHTML(theSelectedText){
        document.forms[0].selectedACTtext.value = theSelectedText;
        if(theSelectedText==''){
            alert('Please select text in the Judgement before you want to connect ACTS');
            return false;
        }else{
            $('<a href="Hlist-acts.php?string='+escape(theSelectedText)+'"></a>').dialog('open');
        }
    }
    function HTagAct(actid){
        var myEditor = CKEDITOR.instances.headnote;
        var FormattedText = '<a href="javascript:showAct('+actid+');">' + document.forms[0].selectedACTtext.value+'</a>';
        myEditor.insertHtml(FormattedText);
    }
    /*-------------------------------------------------------------------------------------*/
    function HACTSECTIONInsertHTML(theSelectedText){
        document.forms[0].selectedACTtext.value = theSelectedText;
        if(theSelectedText==''){
            alert('Please select text in the Judgement before you want to connect ACTS');
            return false;
        }else{
            $('<a href="Hlist-sections.php?string='+escape(theSelectedText)+'"></a>').fancybox({overlayShow: true,
                'hideOnContentClick': false
            }).click();
        }
    }
    function HTagSections(sectionid){
        var myEditor = CKEDITOR.instances.headnote;
        //var FormattedText = '<a href="#" title="ajax:bubble-section.php?id='+sectionid+'" >' + document.forms[0].selectedACTtext.value+'</a>';
        var FormattedText = '<a href="javascript:ShowSection('+sectionid+')">' + document.forms[0].selectedACTtext.value+'</a>';
        myEditor.insertHtml(FormattedText);
    }
    /*-------------------------------------------------------------------------------------*/


    </script>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
