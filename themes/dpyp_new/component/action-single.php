<?php if( is_single() ){ ?>
    <div class="action-mobile d-flex d-sm-none d-md-none">
        <ul class="nav justify-content-between">
            <li class="nav-item"><div class="btn-comment-mb">Viết bình luận ...</div></li>
            <li class="nav-item item-comment">
                <a class="nav-link" href="#">
                    <i class="icon-comment-mb"></i> <span class="number"><?php echo get_comments_number(); ?></span>
                </a>
            </li>
            <li class="nav-item item-share">
                <a class="nav-link" href="#">
                    <i class="icon-share-mb"></i>
                    Chia sẻ
                </a>
            </li>
        </ul>
    </div>
    <div class="action-share">
        <div class="header-share">Chia sẻ</div>
        <ul>
            <li class="facebook">
                <a href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank" rel="noopener"> <i class="fa fa-facebook" aria-hidden="true"></i> Đăng lên Facebook </a>
            </li>
            <li class="twitter">
                <a href="https://twitter.com/intent/tweet?status=" target="_blank" rel="noopener"> <i class="fa fa-twitter" aria-hidden="true"></i> Đăng lên Twitter </a>
            </li>
            <li class="copy-link">
                <a href="/" target="_blank" rel="noopener"> <i class="fa fa-link" aria-hidden="true"></i> Sao chép liên kết<span class="alert-copy">Đã sao chép</span> </a>
            </li>
            <li class="other-share">
                <a href="/" target="_blank" rel="noopener"> <i class="fa fa-share-alt" aria-hidden="true"></i> Khác </a>
            </li>
        </ul>
        <span class="close-share">Bỏ qua</span>
    </div>
    <div class="bg-action-share"></div>
<?php } ?>