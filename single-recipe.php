<?php

/**
 ** Template Name: Single Recipe
 ** Template Post Type: post
 */

get_header(); ?>

<div class="max-w-4xl mx-auto p-6 bg-white mt-10">
    <!-- Hero Section -->
    <div class="mb-6">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="w-full h-64 object-cover rounded-lg">
        <?php endif; ?>

        <h1 class="text-3xl font-bold mt-4"><?php the_title(); ?></h1>
        <p class="text-gray-600 mt-2"><?php the_excerpt(); ?></p>

        <!-- Servings & Time -->
        <div class="flex items-center space-x-4 mt-3">
            <div class="flex items-center">
                <span class="text-lg font-semibold">🍽️ <?php echo get_post_meta(get_the_ID(), 'servings', true); ?> Servings</span>
            </div>
            <div class="flex items-center">
                <span class="text-lg font-semibold">⏳ <?php echo get_post_meta(get_the_ID(), 'cook_time', true); ?> mins</span>
            </div>
        </div>
    </div>
    <!-- Recipe Details -->
    <div class="grid md:grid-cols-2 gap-6">

        <!-- Ingredients -->
        <div>
            <h2 class="text-2xl font-semibold mb-3">Ingredients</h2>
            <ul class="space-y-2">
                <?php
                $ingredients = get_post_meta(get_the_ID(), 'ingredients', true);
                if ($ingredients) :
                    $ingredients_list = explode("\n", $ingredients);
                    foreach ($ingredients_list as $ingredient) :
                ?>
                        <li class="flex items-center">
                            <input type="checkbox" class="mr-2">
                            <?php echo esc_html($ingredient); ?>
                        </li>
                <?php endforeach;
                endif; ?>
            </ul>
        </div>

        <!-- Instructions -->
        <div>
            <h2 class="text-2xl font-semibold mb-3">Instructions</h2>
            <ol class="list-decimal list-inside space-y-2">
                <?php
                $instructions = get_post_meta(get_the_ID(), 'instructions', true);
                if ($instructions) :
                    $steps = explode("\n", $instructions);
                    foreach ($steps as $step) :
                ?>
                        <li><?php echo esc_html($step); ?></li>
                <?php endforeach;
                endif; ?>
            </ol>
        </div>
    </div>

    <!-- Buttons -->
    <div class="mt-6 flex space-x-4">
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg">Save Recipe</button>
        <button class="bg-gray-600 text-white px-4 py-2 rounded-lg">Print Recipe</button>
    </div>

    <!-- Related Recipes Section -->
    <div class="mt-10">
        <h2 class="text-2xl font-semibold mb-4">You May Also Like</h2>
        <div class="grid md:grid-cols-3 gap-4">
            <?php
            $related_recipes = new WP_Query(array(
                'post_type'      => 'recipe',
                'posts_per_page' => 3,
                'post__not_in'   => array(get_the_ID())
            ));

            if ($related_recipes->have_posts()) :
                while ($related_recipes->have_posts()) : $related_recipes->the_post();
            ?>
                    <div>
                        <a href="<?php the_permalink(); ?>" class="block">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-32 object-cover rounded-lg">
                            <?php endif; ?>
                            <h3 class="text-lg font-semibold mt-2"><?php the_title(); ?></h3>
                        </a>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>