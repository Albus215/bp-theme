<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link    https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACMWPT
 */

get_header();

?>
    <main class="main tpl-404">

        <div class="box-wrap">
            <div class="box-grid box-grid-a-hcenter pb-5 pt-5">
                <div class="box-sm-12 box-md-6 box-align-center">
                    <div class="the-content txt-center">
                        <h1 style="font-size: 140px; padding-bottom: 0">404</h1>
                        <h5>Page not found</h5>
                        <p>
                            <a class="btn__black-pink" href="<?= home_url() ?>">
                                Back to website
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </main>
<?php
get_footer();
