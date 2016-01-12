<?php
    $nameError=$telError=$emailError=$companyError=$commentError="";
    $hasError=false;
    if(isset($_POST['submitted'])) {
        if(trim($_POST['name']) === '') {
            $nameError = '请输入您的姓名.';
            $hasError = true;
        } else {
            $name = trim($_POST['name']);
        }

        if(trim($_POST['tel']) === '') {
            $telError = '请输入您的电话号.';
            $hasError = true;
        } else if (!eregi("((\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$)",trim($_POST['tel']))){
            $telError = '电话号格式不正确';
        } else {
            $tel = trim($_POST['name']);
        }
     
        if(trim($_POST['email']) === '')  {
            $emailError = '请输入您的邮箱地址.';
            $hasError = true;
        } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
            $emailError = '邮箱地址不正确.';
            $hasError = true;
        } else {
            $email = trim($_POST['email']);
        }
     
        if(trim($_POST['comments']) === '') {
            $commentError = '请输入您的意见.';
            $hasError = true;
        } else {
            if(function_exists('stripslashes')) {
                $comments = stripslashes(trim($_POST['comments']));
            } else {
                $comments = trim($_POST['comments']);
            }
        }
     
        if(!isset($hasError)) {
            $emailTo = get_option('tz_email');
            if (!isset($emailTo) || ($emailTo == '') ){
                $emailTo = get_option('admin_email');
            }
            $company = trim($_POST['company']);
            $subject = '[PHP Snippets] From '.$name;
            $body = "姓名: $name \n\n电话: $tel \n\n邮箱: $email  \n\n公司: $company \n\n需求: $comments";
            $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
             
            if(wp_mail($emailTo, $subject, $body)){$emailSent = true;}else{$emailSent="失败";}
            
        }
    }
     
    ?>
<?php get_header();?>
<body class="contact">
    <?php include(TEMPLATEPATH.'/menu.php');?>
    <div class="clear"></div>
    <div class="main">
        <div class="banner">
            <?php
            $post_id=17;
            $post_info=get_post($post_id);
            $title=$post_info->post_title;
            $content=$post_info->post_content;
            $excerpt=$post_info->post_excerpt;
             ?>
            <div class="text page-width">
                <h2><?php echo $title;?></h2>
                <p><?php echo $content;?></p>
                <div class="btn">
                    <a href="<?php echo get_category_link(6)?>" class="btn-set"><?php echo $excerpt;?></a>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="page-width">
                <div class="title">
                    <h2>您的<span>需求</span></h2>
                </div>
                
                <div class="form">
                    <form name="form1" id="formId" action="" method="post" >
                        <div class="entry fl">
                            <input type="text" name="name" placeholder="姓名" />
                            <span class="note">*</span>
                        </div>
                        <div class="entry fr">
                            <input type="text" name="tel" placeholder="电话" />
                            <span class="note">*</span>
                        </div>
                        <div class="entry fl">
                            <input type="email" name="email" placeholder="邮箱" />
                            <span class="note">*</span>
                        </div>
                        <div class="entry fr">
                            <input type="text" name="company" placeholder="公司" />
                        </div>
                        <textarea name="comments" placeholder="请在这里简要说明您的需求"></textarea>
                        <div class="btn">
                            <a href="#" class="btn-set btn-email" id="btn-email">提交</a>
                            <input type="hidden" name="submitted" id="submitted" value="true" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="content">
            <div class="section-1 section">
                <div class="page-width">
                    <div class="container">
                        <div class="text">
                            <div class="title">
                                <?php
                                $post_id=90;
                                $post_info=get_post($post_id);
                                $title=$post_info->post_title;
                                $content=$post_info->post_content;
                                $excerpt=$post_info->post_excerpt;
                                 ?>
                                <h3><?php echo $title;?></h3>
                            </div>
                            <?php echo $content;?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-3 section">
                <div class="page-width">
                    <div class="container">
                    <?php
                    $post_id=92;
                    $post_info=get_post($post_id);
                    $title=$post_info->post_title;
                    $content=$post_info->post_content;
                    $excerpt=$post_info->post_excerpt;
                    $ID=$post_info->ID;
                     ?>
                    <div class="text">
                        <div class="title">
                            <h3><?php echo $title;?></h3>
                        </div>
                        <?php echo $content;?>
                    </div>
                    <div class="pic">
                        <a href=""><img src="<?php
$thumbnail_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full');
echo $thumbnail_image_url[0];
?>"></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php get_sidebar();?>
        <?php get_footer();?>
        