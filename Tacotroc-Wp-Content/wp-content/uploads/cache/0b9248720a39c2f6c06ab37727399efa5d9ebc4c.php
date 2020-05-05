<?php
  $author_id = $post->post_author;
?>

<p class="path" style="cursor:pointer">
  <span >Accueil</span> <span class="pathImg"><img src="<?= App\asset_path('images/img_research/Base.png'); ?>" alt="triangle" id="triangle" /></span>
  <span class="pathelt"> À la une</span></p>

  <p id="articlePicture">
    <img src="<?= get_the_post_thumbnail_url() ?>" alt="photo de volant" id="picture1" />
  </p>
</p>

<h1 id="articleH1"><?= get_the_title() ?></h1>

<section id="articleFirst">
    <article id="ArticleContent">
        <div id="infoWriter">
            <div id="avatar">
                <div id="avatarPic">
                    <img src="<?= get_avatar_url($author_id) ?>" alt="avatar" id="pic" />
                </div>
                <div id="avatarContent">
                    <p><?= get_the_author(); ?></p>
                </div>
            </div>
            <img src="<?= App\asset_path('images/img_article/barre.png'); ?>" alt="barre verticale" class="barre" />

            <div id="comm">
                <p><span id="numberCom"><?= get_comments_number() ?></span><br> commentaires</p>
            </div>
        </div>

        <div id="articleText">
            <?php the_content() ?>
        </div>
    </article>

    <article id="articlePop">
        <p id="articleHr"><img src="<?= App\asset_path('images/img_article/hr.png'); ?>" alt="barre horizontale" id="hr" /> <span>Derniers articles</span></p>

        <?php
          global $wpdb;
          $query = 'SELECT * FROM wp_posts WHERE post_status = "publish" AND post_type = "post" AND ID not in ('.$post->ID.') ORDER BY post_date';
          $lastSingle = $wpdb->get_results($query);
        ?>

        <?php foreach($lastSingle as $last): ?>
        <div id="articleResume">
            <div id="resumecontent">
                <h3><?= get_the_title($last->ID) ?></h3>
                <p> <?=  date('d/m/y', strtotime($last->post_date))?></p>
            </div>
            <div id="resumePicture" style="background-image: url('<?= get_the_post_thumbnail_url($last->ID) ?>');"></div>
        </div>
        <?php endforeach; ?>

    </article>
</section>

<section id="articleCom">
    <?php comments_template('/partials/comments.blade.php') ?>
    <!-- <div id="nextPrev">
        <a href="#">
            <div id="prev">
                <p onmouseover="hoverArrowLeft()" onmouseout="OutArrowLeft()"><img src="<?= App\asset_path('images/img_article/Left_Arrow_Icon.png'); ?>" alt="flèche gauche" id="leftArrow" />Article précédent</p>
                <p>Duis aute irure dolor</p>
            </div>
        </a>
        <img src="<?= App\asset_path('images/img_article/barre.png'); ?>" alt="barre" class="barre" />
        <a href="#">
            <div id="next">
                <p onmouseover="hoverArrowRight()" onmouseout="OutArrowright()">Article suivant<img src="<?= App\asset_path('images/img_article/Left_Arrow_Icon.png'); ?>" alt="flèche droite" id="rightArrow" /></p>
                <p>Nemo enim ipsam</p>
            </div>
        </a>
    </div> -->
</section>
