 <?php
/*
Widget-title: Login user menu (wide)
Widget-preview-image: /assets/img/widgets_preview/header_menu-for-loginuser.jpg
 */
?>

 <div class="container container-palette top-bar-login">
    <div class="container-top">
{is_logged_user}
            <ul class="login-menu clearfix">
                <?php if(file_exists(APPPATH.'controllers/admin/booking.php')):?>
                <li><a href="{myreservations_url}#content"><i class="fa fa-shopping-cart"></i> <?php _l('Myreservations');?></a></li>
                <?php endif; ?>
                <li><a href="{myproperties_url}#content"><i class="fa fa-list"></i> <?php _l('Myproperties');?></a></li>
                <?php if(file_exists(APPPATH.'controllers/admin/savesearch.php')): ?>
                <li><a href="{myresearch_url}#content"><i class="fa fa-filter"></i> <?php _l('Myresearch');?></a></li>  
                <?php endif; ?>
                <?php if(file_exists(APPPATH.'controllers/admin/favorites.php')):?>
                <li><a href="{myfavorites_url}#content"><i class="fa fa-star"></i> <?php _l('Myfavorites');?></a></li>
                <?php endif; ?>
                <li><a href="<?php _che($mymessages_url); ?>#content"><i class="fa fa-envelope"></i> <?php _l('My messages'); ?></a></li>
                <li><a href="{myprofile_url}#content"><i class="fa fa-user"></i> <?php _l('Myprofile');?></a></li>
                <li><a href="{logout_url}"><i class="fa fa-power-off"></i> <?php _l('Logout');?></a></li>
                <?php if(isset($page_edit_url)&&!empty($page_edit_url)):?>
                <li><a href="{page_edit_url}"><i class="fa fa-edit"></i>  <?php echo _l('edit page');?></a></li>
                <?php endif;?>
            </ul>
{/is_logged_user}
{is_logged_other}
        <ul class="login-menu clearfix">
            <li><a href="{login_url}"><i class="fa fa-wrench"></i> <?php _l('Admininterface');?></a></li>
            <li><a href="{logout_url}"><i class="fa fa-power-off"></i> <?php _l('Logout');?></a></li>
            <?php if(isset($page_edit_url)&&!empty($page_edit_url)):?>
            <li><a href="{page_edit_url}"><i class="fa fa-edit"></i> <?php _l('edit page');?></a></li>
            <?php endif;?>
            <?php if(isset($category_edit_url)&&!empty($category_edit_url)) :?>
            <li><a href="{category_edit_url}"><i class="fa fa-edit"></i> <?php _l('edit category');?></a></li>
            <?php endif;?>
            
            <?php
            $CI = &get_instance();
            if($CI->uri->segment(1) == $listing_uri):?>
                <li><a href="<?php echo site_url('admin/estate/options');?>"><i class="fa fa-edit"></i> <?php echo lang_check('edit fields');?></a></li>
            <?php endif; ?>
                
            <?php if(isset($property_id)):?>
                <?php
                $CI = &get_instance();
                $CI -> load -> model('customtemplates_m');
                $listing_selected = array();
                $listing_selected['theme'] = $settings_template;
                $listing_selected['type'] = 'LISTING';
        
                $template_data = $CI->customtemplates_m->get_by($listing_selected, TRUE);
                if(!empty($template_data) && is_object($template_data)):
                ?>
                <li>
                    <a href="<?php echo site_url('admin/templates/edit_listing/'.$template_data->id);?>"><i class="ion-edit"></i> <?php echo lang_check('Visual designer editing');?></a>
                </li>
                <?php endif;?>
            <?php elseif(isset($page_template)): ?>    
                <?php if(substr($page_template, 0, 7) == 'custom_'): $template_id = substr($page_template, 7);?>
                <li>
                    <a href="<?php echo site_url('admin/templates/edit/'.$template_id);?>"><i class="ion-edit"></i> <?php echo lang_check('Visual designer editing');?></a>
                </li>
                <?php endif;?>
            <?php endif;?>
            
        </ul>
{/is_logged_other}
</div>
</div>