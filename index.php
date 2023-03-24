<?php
get_header();
?>

<?php if ( have_posts() ) : the_post(); 

?>
    <div class="header empty"></div>
	<div class="section">
        <h2><?php echo get_the_title();?></h2>
    </div>
    <?php 
    $the_content = apply_filters( 'the_content', get_the_content() );
    if ( !empty( $the_content ) ) {
        echo '<div class="section">'.$the_content.'</div>';
    }
    ?>
    
	


<?php else: ?>
	Записей нет.
<?php endif; ?>

<?php
get_footer();
