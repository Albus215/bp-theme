<?php
/**
 * Template Name: PageBuilder
 */

use YAWPT\Core\Core;

get_header();
$pageSections = get_field('page_sections');

$pageBuilderMap = [
    'section_id' => 'section/file-path',
];

?>
    <main class="main">
        <?php if (!empty($pageSections))
            foreach ($pageSections as $pageSection)
                if (in_array($pageSection['acf_fc_layout'], array_keys($pageBuilderMap)))
                    Core::load($pageBuilderMap[$pageSection['acf_fc_layout']], $pageSection); ?>
    </main>
<?php
get_footer();
