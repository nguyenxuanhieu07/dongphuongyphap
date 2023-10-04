<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package DPYP
 */

get_header();

$doctor_name =  rwmb_meta('dt_ho_ten');
$danh_hieu =  rwmb_meta('dt_danh_hieu');

$_facebook = rwmb_meta('dt_facebook');
$_instagram = rwmb_meta('dt_instagram');
$_linkedin = rwmb_meta('dt_linkedin');
$_pinterest = rwmb_meta('dt_pinterest');
$_soundcloud = rwmb_meta('dt_soundcloud');
$_twitter = rwmb_meta('dt_twitter');
$_youtube = rwmb_meta('dt_youtube');
$_wikipedia = rwmb_meta('dt_wikipedia');
?>

    <main class="page-content doctor" id="page-content">
        <div class="container">

            <?php get_template_part("template-parts/content" , "breadcrumb"); ?>
            <h1 class="title-doctor">
                <?php the_title(); ?>
            </h1>

            <div class="row">
                <div class="col-md-3">
                    <div class="doctor-info sticky text-center">
                        <?php the_post_thumbnail('medium') ?>
                        <h2 class="doctor-name"><?php echo ($doctor_name != null ) ? $doctor_name : ''; ?></h2>
                        <p class="doctor-vcard"><?php echo ($danh_hieu != null ) ? $danh_hieu : ''; ?></p>
                        <ul class="list-social-doctor">
                            <?php if( $_facebook != null ){ ?>
                                <li>
                                    <a href="<?php echo $_facebook ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>

                            <?php if( $_instagram != null ){ ?>
                                <li>
                                    <a href="<?php echo $_instagram ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>

                            <?php if( $_linkedin != null ){ ?>
                                <li>
                                    <a href="<?php echo $_linkedin ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>

                            <?php if( $_pinterest != null ){ ?>
                                <li>
                                    <a href="<?php echo $_pinterest ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>

                            <?php if( $_soundcloud != null ){ ?>
                                <li>
                                    <a href="<?php echo $_soundcloud ?>"><i class="fa fa-soundcloud" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>

                            <?php if( $_twitter != null ){ ?>
                                <li>
                                    <a href="<?php echo $_twitter ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>

                            <?php if( $_youtube != null ){ ?>
                                <li>
                                    <a href="<?php echo $_youtube ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>

                            <?php if( $_wikipedia != null ){ ?>
                                <li>
                                    <a href="<?php echo $_wikipedia ?>"><i class="fa fa-wikipedia-w" aria-hidden="true"></i></a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="doctor-action">
                            <a href="#" class="btn btn-question mb-2" data-toggle="modal" data-target="#modal-question">Gửi câu hỏi cho bác sĩ<i class="fa fa-angle-right d-flex align-items-center justify-content-center" aria-hidden="true"></i></a>
                            <a href="#" class="btn btn-apointment" data-toggle="modal" data-target="#modal-apointment">Đặt lịch hẹn<i class="fa fa-angle-right d-flex align-items-center justify-content-center" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="modal fade modal-question modal-doctor-single" id="modal-question" tabindex="-1" role="dialog" aria-labelledby="modal-question-title" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-question-title">Đặt câu hỏi cho bác sĩ</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" class="form-sidebar form-label">
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="fullname" class="form-control" required="required" />
                                                <label for="">Họ tên</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="numberphone" class="form-control" inputmode="decimal" required="required" pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}" />
                                                <label for="">Điện thoại</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="email" class="form-control"/>
                                                <label for="">Email</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea name="content" class="form-control" rows="3"></textarea>
                                                <label for="">Vấn đề của bạn</label>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-submit" type="submit">Gửi câu hỏi cho bác sĩ <i class="fa fa-paper-plane d-flex align-items-center justify-content-center" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                    <div class="result-form"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade modal-apointment modal-doctor-single" id="modal-apointment" tabindex="-1" role="dialog" aria-labelledby="modal-apointment-title" aria-modal="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-apointment-title">Đặt lịch khám</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" class="book-apointment form-apointment form-label">
                                        <div class="form-row">
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="fullname" class="form-control" required="required" />
                                                <label for="">Họ tên</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="numberphone" class="form-control" required="required" />
                                                <label for="">Điện thoại</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <input type="text" name="email" class="form-control" required="required" />
                                                <label for="">Email</label>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <div class="form-group">
                                                    <input type="date" id="date-trigger">
                                                    <input name="date" type="text" id="date-form" inputmode="decimal" class="form-control" required="">
                                                    <label for="date-form">Ngày hẹn</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea name="content" class="form-control" rows="3"></textarea>
                                                <label for="">Vấn đề của bạn</label>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button class="btn btn-submit" type="submit">Đặt lịch <i class="fa fa-calendar-check-o d-flex align-items-center justify-content-center" aria-hidden="true"></i></button>
                                        </div>
                                    </form>
                                    <div class="result-form"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="entry entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        
        </div>
    </main>

<?php
get_footer();
