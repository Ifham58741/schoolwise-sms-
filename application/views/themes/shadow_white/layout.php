<!DOCTYPE html>
<html dir="<?php echo ($front_setting->is_active_rtl) ? "rtl" : "ltr"; ?>" lang="<?php echo ($front_setting->is_active_rtl) ? "ar" : "en"; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $page['title']; ?></title>        
        <meta name="title" content="<?php if(isset($page['meta_title'])){ echo $page['meta_title']; } ?>">
        <meta name="keywords" content="<?php if(isset($page['meta_keyword'])){ echo $page['meta_keyword']; } ?>">
        <meta name="description" content="<?php if(isset($page['meta_description'])){ echo $page['meta_description']; } ?>">   
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo base_url($front_setting->fav_icon); ?>" type="image/x-icon">
        <link href="<?php echo $base_assets_url; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $base_assets_url; ?>css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/ss-print.css">
        <link rel="stylesheet" href="<?php echo $base_assets_url; ?>datepicker/bootstrap-datepicker3.css"/>
               <script src="<?php echo base_url(); ?>backend/dist/js/moment.min.js"></script>
        <!--file dropify-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>backend/dist/css/dropify.min.css">
  <script src="<?php echo base_url(); ?>backend/custom/jquery.min.js"></script>
        <!--file dropify-->
        <script src="<?php echo base_url(); ?>backend/dist/js/dropify.min.js"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url() ?>";
        </script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/dist/css/bootstrap-select.min.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>backend/dist/js/bootstrap-select.min.js"></script>
        <script type="text/javascript">
        $(function () {
            $('.languageselectpicker').selectpicker();
        });
        </script>
        <?php

if ($front_setting->is_active_rtl) {
    ?>
            <link href="<?php echo $base_assets_url; ?>rtl/bootstrap-rtl.min.css" rel="stylesheet">
            <link href="<?php echo $base_assets_url; ?>rtl/style-rtl.css" rel="stylesheet">
            <?php
}
?>

        <?php if ($this->module_lib->hasModule('online_course') && $this->module_lib->hasActive('online_course')) { ?>
        <link rel="stylesheet" href="<?php echo $base_assets_url; ?>css/online-course.css"/>        
        <?php } ?>
        
        <?php echo $front_setting->google_analytics; ?>
        <?php $currency_symbol = $this->customlib->getSchoolCurrencyFormat();?>
<style type="text/css">

form .form-bottom button.btn {
    min-width: 105px;
}

form .form-bottom .input-error {
    border-color: #d03e3e;
    color: #d03e3e;
}

form.gauthenticate-form {
    display: none;
}
</style>

    <link href="<?php echo base_url(); ?>backend/toast-alert/toastr.css" rel="stylesheet"/>
    <script src="<?php echo base_url(); ?>backend/toast-alert/toastr.js"></script>
    
    </head>
    <body>
        <div id="alert" class="affix-top">
            <header class="">
                <div class="toparea">
                    <div class="container">
                        <div class="row">
                           <div class="col-lg-6 col-md-5 col-sm-12">
                                <ul class="toplist">
                                    <li><a href="mailto:<?php echo $school_setting->email; ?>"><i class="fa fa-envelope-o i-plain"></i><?php echo $school_setting->email; ?></a></li>
                                    <li><i class="fa fa-phone i-plain"></i><?php echo $school_setting->phone; ?></li>

                                </ul>
                            </div><!--./col-md-6-->
                             <div class="col-lg-6 col-md-7 col-sm-12">
                              <div class="top-right flex-column-sm"> 
                                <ul class="topicon">
                                    <li><?php echo $this->lang->line('follow_us'); ?></li>
                                    <?php $this->view('/themes/darkgray/social_media');?>
                                    
                                <ul class="topicon"> 				 
                                    <?php if ($this->module_lib->hasModule('online_course') && $this->module_lib->hasActive('online_course')) { ?>
                                    <?php if($active_menu == 'online_course' && (!empty($currencies))){ ?>
                                    <li class="menuinlinemobile">
                                        <div class="currency-icon-list">
                                        <select class="languageselectpicker currency_list" name="currency" type="text" id="currencySwitcher">
                                        <?php 
                                            foreach ($currencies as $currencie_key => $currencie_value) {  
                                        ?>
                                        <option value="<?php echo $currencie_value->id; ?>" <?php
                                        if ( $currencie_value->id == $this->customlib->getSchoolCurrency()) {
                                            echo "Selected";
                                        }
                                        ?> ><?php echo $currencie_value->short_name." (".$currencie_value->symbol.")"; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                      </div>
                                    </li>
                                    <?php } ?>                                                                    
                                    
                                 <li class="dropdown menuinlinemobile" id="">
                        <?php if($active_menu == 'online_course'){ ?>
                        <div class="shop-chart" data-toggle="dropdown">
                            <a href="#" class="dropdown-toggle"  >
                                <i class="fa fa-shopping-cart"></i>
                                <?php
                                    $cartdata = $this->cart->contents();

                                    if (!empty($cartdata)) {if (sizeof($cartdata) > 0) {?>
                                        <span id="item_count_replace" ><?php echo count($cartdata); ?></span>
                                        
                                    <?php }}?>
                                <span id="item_count_replace_show" class="hide" ></span>
                            </a>
                        </div>
                        <?php } ?>
                        <div class="dropdown-menu shop-chart-top13">
                          <div class="cart-wrapper cart-list" id="card_data_list_hide">
                            <ul>
                                <div id="card_data_list"></div>
                            </ul>
                          </div>
                          <div class="cart-wrapper cart-list" id="card_data_list_show">
                            <ul>
                                <?php
$total = 0;
$count = 0;

if (!empty($cartdata)) {
    foreach ($cartdata as $key => $cvalue) {
        $course_data = $this->customlib->getCourseDetail($cvalue['id']);

        if (!empty($course_data)) {
            $total += $cvalue['price'];
            ++$count;
            $course_price = amountFormat($cvalue['price']);
            
            if ($course_data["course_thumbnail"] != '') {
                $thumbnail = base_url() . "uploads/course/course_thumbnail/" . $course_data["course_thumbnail"];
            } else {
                $thumbnail = base_url() . 'backend/images/wordicon.png';
            }

            ?>
            <li>
                      <div class="cartitem">
                        <div class="item-image">
                            <a href="<?php echo base_url(); ?>course/coursedetail/<?php echo $course_data["slug"]; ?>"><img src="<?php echo $thumbnail; ?>" alt="" class="img-responsive"></a>
                        </div>
                        <div class="cartdetail">
                            <a href="<?php echo base_url(); ?>course/coursedetail/<?php echo $course_data["slug"]; ?>">
                                <div class="course-name"><?php echo $course_data['title'] ?></div>
                                <div class="courseprice"><?php echo $currency_symbol . $course_price ?> </div>
                            </a>
                            <a class="btn btn-warning btn-xs pull-right" title="<?php echo $this->lang->line('delete'); ?>" onclick="removecartheader('<?php echo $cvalue['rowid']; ?>')"><i class="fa fa-trash-o"></i></a>
                        </div>
                      </div>
                    </li>
    <?php }}}?>
                            </ul>
                          </div>
                        <div class="cart-footer">
                            <div class="focarttotal-price">
                                <b id="card_total_amount">
                                <?php
if ($this->cart->total() == 0) {
    $course_total = 0;
} else {
    $course_total = $this->cart->total();
}
$course_total = amountFormat($course_total);
echo $this->lang->line('total') . " " . $currency_symbol . $course_total;

if (empty($cartdata)) {
echo "<p><small>".$this->lang->line('your_cart_is_empty_please_add_courses')."</small></p>"; 
}
?>
                                </b>
                                <span id="total_course">
                                    <?php
if (!empty($cartdata)) {
    echo $this->cart->total_items() . ' ' . $this->lang->line('item');
}
?>
                                </span>
                            </div>
                            <a href="<?php echo base_url() . "cart" ?>" class="gotocartbtn btn btn-success"><?php echo $this->lang->line('go_to_cart') ?></a>
                        </div><!--./cart-footer-->
                        </div>
                    </li>
                     <?php } ?>
                     
                                    <li>
                                    
                            <?php 
                                $guest_login = 0;
                                if (empty($course_setting->guest_login)) { 
                                    $guest_login = 0;
                                }else{ 
                                    $guest_login = $course_setting->guest_login; 
                                } 
                            ?>
                            
                                    <?php if ($this->module_lib->hasModule('online_course') && $this->module_lib->hasActive('online_course')) {
                                        if($guest_login == 0){
                                            
                                            if ($setting_data[0]['student_panel_login']) { ?>
                                            <a class="login" href="<?php echo base_url(); ?>site/userlogin"><i class="fa fa-user"></i><?php echo $this->lang->line('login'); ?></a>
                                        <?php } 
                                            
                                        }else{
                                        if (!$this->session->userdata('student')) {  ?>
                                            <a class="login" onclick="openmodal()"><i class="fa fa-user"></i><?php echo $this->lang->line('login'); ?></a>
                                        <?php } else {?>
                                            <a class="login" href="<?php echo base_url(); ?>course/logout"><?php echo $this->lang->line('logout'); ?></a>
                                        <?php } 
                                        }
                                        }else{  if ($setting_data[0]['student_panel_login']) { ?>
                                            <a class="login" href="<?php echo base_url(); ?>site/userlogin"><i class="fa fa-user"></i><?php echo $this->lang->line('login'); ?></a>
                                        <?php } } ?>      
                                    </li>                                    
                                </ul>
                            </div><!--./col-md-3-->
                        </div>
                    </div>
                </div><!--./toparea-->
                <?php echo $header; ?>
            </header>
        </div>
        
<!---   Guest Signup  --->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-small">
                <button type="button" class="close closebtnmodal" data-dismiss="modal">&times;</button>
                <h4 ><?php echo $this->lang->line('guest_registration') ?></h4>
            </div>
            <form action="<?php echo base_url() . 'course/guestsignup' ?>" method="post" class="signupform" id="signupform">
                <div class="modal-body">
                    <div class="form-group">
                        <label><?php echo $this->lang->line('name'); ?></label><small class="req"> *</small>
                        <input type="text" class="form-control reg_name" name="name" id="name" autocomplete="off">
                        <span class="text-danger" id="error_refno"></span>
                    </div>
                    <div class="form-group mb10">
                        <label><?php echo $this->lang->line('email_id'); ?></label><small class="req"> *</small>
                        <input type="text"  class="form-control reg_email"  name="email" id="email" autocomplete="off" >
                        <span class="text-danger" id="error_dob"></span>
                    </div>
                    <div class="form-group mb10">
                        <label><?php echo $this->lang->line('password'); ?></label><small class="req"> *</small>
                        <input type="password"  class="form-control reg_password"  name="password" id="password" autocomplete="off" >
                        <span class="text-danger" id="error_dob"></span>
                    </div>
                    <div id="load_signup_captcha"></div>                   
                </div>
                <div class="modal-footer">
                    <button type="button"  class="modalclosebtn btn  mdbtn" onclick="openmodal()"><?php echo $this->lang->line('login'); ?></button>
                    <button type="submit" id="signupformbtn" class="onlineformbtn mdbtn" ><?php echo $this->lang->line('signup'); ?> </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!---   Guest Login  --->
<div id="loginmodal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-small">
                <button type="button" class="close closebtnmodal" data-dismiss="modal">&times;</button>
                <h4 ><?php echo $this->lang->line('guest').' '.$this->lang->line('login') ?>  </h4>
            </div>
            <form action="<?php echo site_url('course/guestlogin') ?>" method="post" class="loginform" id="loginform">
                <div class="modal-body">
                    <div class="form-group mb10">
                        <label><?php echo $this->lang->line('email_id'); ?></label><small class="req"> *</small>
                        <input type="text"  class="form-control login_email"  name="username" id="username" autocomplete="off">
                        <span class="text-danger" id="error_dob"></span>
                    </div>
                    <div class="form-group mb10">
                        <label><?php echo $this->lang->line('password'); ?></label><small class="req"> *</small>
                        <input type="password"  class="form-control login_password"  name="password" id="password" autocomplete="off" >
                        <input type="hidden"  class="form-control "  name="checkout_status" id="checkout_status"  autocomplete="off" >
                        <span class="text-danger" id="error_dob"></span>
                    </div>
                    <div id="load_login_captcha"></div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="pull-left forgotbtn" data-toggle="modal" data-target="#forgotmodal"><i class="fa fa-key"></i> <?php echo $this->lang->line('forgot_password'); ?></a>                    
                    <button type="button" class="signup modalclosebtn btn mdbtn" data-dismiss="modal"><?php echo $this->lang->line('signup'); ?> </button>
                    <button type="submit" id="loginformbtn" class="onlineformbtn mdbtn" ><?php echo $this->lang->line('submit'); ?></button>
                </div>
            </form>
            <form action="<?php echo site_url('course/user_submit_login') ?>" method="post" class="gauthenticate-form" id="gauthenticate-form">
                <div class="modal-body">                   
                  <div class="form-group mb10">
                        <label><?php echo $this->lang->line('verification_code'); ?></label><small class="req"> *</small>
                        <input type="text"  class="form-control gauth_code"  name="gauth_code" id="gauth_code" autocomplete="off" >                       
                        <span class="text-danger" id="error_gauth_code"></span>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <a href="#" class="pull-left forgotbtn" data-toggle="modal" data-target="#forgotmodal"><i class="fa fa-key"></i> <?php echo $this->lang->line('forgot_password'); ?></a>
                    <button type="button" class="signup modalclosebtn btn mdbtn" data-dismiss="modal"><?php echo $this->lang->line('signup'); ?> </button>
                    <button type="submit" id="loginformbtn" class="onlineformbtn mdbtn" data-loading-text="<i class='fa fa-spinner fa-spin '></i> wait..."><?php echo $this->lang->line('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
        
<div id="forgotmodal" class="modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-small">
                <button type="button" class="close closebtnmodal" data-dismiss="modal">&times;</button>
                <h4 class=><?php echo $this->lang->line('forgot_password'); ?></h4>
            </div>
            <form action="#" method="post" class="loginform" id="forgotform">
                <div class="modal-body">
                    <div class="form-group mb10">
                        <label><?php echo $this->lang->line('email_id'); ?></label><small class="req"> *</small>
                        <input type="email" class="form-control" name="username" id="email" autocomplete="off">
                        <span class="text-danger" id="error_email"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"  class="modalclosebtn btn  mdbtn" onclick="openmodal()"><?php echo $this->lang->line('login'); ?></button>                    
                    <button type="submit" id="forgotformbtn" class="onlineformbtn mdbtn" ><?php echo $this->lang->line('submit'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div> 

        <?php echo $slider; ?>

        <?php if (isset($featured_image) && $featured_image != "") {
    ?>
            <?php
}
?>

        <div class="container spacet50">
            <div class="row">
                <?php
$page_colomn = "col-md-12";

if ($page_side_bar) {

    $page_colomn = "col-md-9 col-sm-9";
}
?>
                <div class="<?php echo $page_colomn; ?>">
                    <?php echo $content; ?>
                </div>
                <?php
if ($page_side_bar) {
    ?>

                    <div class="col-md-3 col-sm-3">
                        <div class="sidebar">
                            <?php
if (in_array('news', json_decode($front_setting->sidebar_options))) {
        ?>
                                <div class="catetab"><?php echo $this->lang->line('latest_news'); ?></div>
                                <div class="newscontent">
                                    <div class="tickercontainer"><div class="mask"><ul id="ticker01" class="newsticker" style="height: 666px; top: 124.54px;">
                                                <?php
if (!empty($banner_notices)) {

            foreach ($banner_notices as $banner_notice_key => $banner_notice_value) {
                ?>
                                                        <li><a href="<?php echo site_url('read/' . $banner_notice_value['slug']) ?>"><div class="datenews"><?php echo date('d', strtotime($banner_notice_value['date'])); ?><span><?php $this->lang->line(strtolower(date('F', strtotime($banner_notice_value['date']))));?></span></div><?php echo $banner_notice_value['title']; ?>
                                                            </a></li>
                                                        <?php
}
        }
        ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div><!--./newscontent-->

                                <?php
}
    ?>

                        </div><!--./sidebar-->
                    </div>
                    <?php
}
?>

            </div><!--./row-->
        </div><!--./container-->
        <?php echo $footer; ?>

        <script src="<?php echo $base_assets_url; ?>js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_assets_url; ?>js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo $base_assets_url; ?>js/jquery.counterup.min.js"></script>
        <script src="<?php echo $base_assets_url; ?>js/owl.carousel.min.js"></script>
        <script src="<?php echo $base_assets_url; ?>js/ss-lightbox.js"></script>
        <script src="<?php echo $base_assets_url; ?>js/custom.js"></script>
        <script type="text/javascript" src="<?php echo $base_assets_url; ?>datepicker/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript">
            $(function () {
                jQuery('img.svg').each(function () {
                    var $img = jQuery(this);
                    var imgID = $img.attr('id');
                    var imgClass = $img.attr('class');
                    var imgURL = $img.attr('src');

                    jQuery.get(imgURL, function (data) {
                        // Get the SVG tag, ignore the rest
                        var $svg = jQuery(data).find('svg');

                        // Add replaced image's ID to the new SVG
                        if (typeof imgID !== 'undefined') {
                            $svg = $svg.attr('id', imgID);
                        }
                        // Add replaced image's classes to the new SVG
                        if (typeof imgClass !== 'undefined') {
                            $svg = $svg.attr('class', imgClass + ' replaced-svg');
                        }

                        // Remove any invalid XML tags as per http://validator.w3.org
                        $svg = $svg.removeAttr('xmlns:a');

                        // Check if the viewport is set, else we gonna set it if we can.
                        if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                        }

                        // Replace image with new SVG
                        $img.replaceWith($svg);

                    }, 'xml');

                });
            });

            $(document).on('change','.currency_list',function(e){ 
                let currency_id=$(this).val();
                $.ajax({
                    type: 'POST',
                    url: base_url+'welcome/changeCurrencyFormat',
                    data: {'currency_id':currency_id},
                    dataType: 'json',
                    beforeSend: function() {
                        
                    },
                    success: function(data) {          
                        window.location.reload();
                    },
                    error: function(xhr) { // if error occured
                
                    },
                    complete: function() {
                        
                    }
                
                });
            });
        </script>
        <script>
        $(document).ready(function () { 
            $('#myModal,#forgotmodal,#loginmodal').modal({
                backdrop: 'static',
                keyboard: false,
                show: false
            });
        });
        </script>
    </body>
</html>