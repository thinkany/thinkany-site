<?php
$blockFields = get_fields();

if ( $blockFields['section_id'] == null) :
    $id = $block['id'];
else :
    $id = $blockFields['section_id'];
endif;
$className = 'sec sec--resources';

?>

<section id="<?php echo $id; ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="wrapper-resources flex flex-col">
            <?php if ( $blockFields['title'] ): ?>
                <h3 class="title"><?= $blockFields['title']; ?></h3>
            <?php endif; ?>
            <?php if ( $blockFields['resources'] ): ?>
                <div class="resources">
                    <?php foreach( $blockFields['resources'] as $resource ) : ?>
                        <div class="resource flex">
                            <span class="resource-title"><?= $resource['resource_title']; ?></span>
                            <div class="resource-links flex">
                                <?php if( $resource['resource_id'] ) : ?>
                                    <a href="#<?= $resource['resource_id'] ; ?>" class="resource-anchor flex flex-ai-c">
                                        <span>View</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="18" viewBox="0 0 26 18">
                                            <g data-name="view icon">
                                                <g data-name="Path 3744" style="fill:none">
                                                    <path d="M13 0c7.18 0 13 9 13 9s-5.82 9-13 9S0 9 0 9s5.82-9 13-9z" style="stroke:none"/>
                                                    <path d="M13 1.5c-3.193 0-6.174 2.198-8.111 4.042A27.773 27.773 0 0 0 1.836 9a27.697 27.697 0 0 0 3.008 3.415C6.792 14.279 9.79 16.5 13 16.5c3.193 0 6.174-2.198 8.111-4.042A27.773 27.773 0 0 0 24.164 9a27.697 27.697 0 0 0-3.008-3.415C19.208 3.721 16.21 1.5 13 1.5M13 0c7.18 0 13 9 13 9s-5.82 9-13 9S0 9 0 9s5.82-9 13-9z" style="fill:#d8be8e;stroke:none"/>
                                                </g>
                                                <g data-name="Ellipse 160" transform="translate(9 5)" style="stroke:#d8be8e;stroke-width:1.5px;fill:none">
                                                    <circle cx="4" cy="4" r="4" style="stroke:none"/>
                                                    <circle cx="4" cy="4" r="3.25" style="fill:none"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif ; ?>
                                <?php if( $resource['resource_file'] ) : ?>
                                    <a href="<?= $resource['resource_file']['url'] ; ?>" class="resource-download flex flex-ai-c" download>
                                        <span>Download</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22.492" height="15.754" viewBox="0 0 22.492 15.754">
                                            <g data-name="download icon">
                                                <path data-name="Path 3600" d="M10.549 0 5.275 5.275 0 0" transform="translate(6.051 4.258)" style="stroke-miterlimit:10;fill:none;stroke:#d8be8e;stroke-width:1.5px"/>
                                                <path data-name="Line 50" transform="translate(11.326)" style="fill:none;stroke:#d8be8e;stroke-width:1.5px" d="M0 9.242V0"/>
                                                <path data-name="Path 3743" d="M748.156 1102.355v7.366h20.992v-7.366" transform="translate(-747.406 -1094.717)" style="fill:none;stroke:#d8be8e;stroke-width:1.5px"/>
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif ; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="resources-bg">
        
    </div>
</section>