<?php if (!empty($children)): ?>
    <ul>
        <?php foreach ($children as $child): ?>
            <li>
                <a href="<?= site_url('products?category=' . $child['slug']) ?>">
                    <?= esc($child['name']) ?>
                </a>

                <?php if (!empty($child['children'])): ?>
                    <?= view('themes/' . $currentTheme . '/products/children_category', [
                        'children' => $child['children']
                    ]); ?>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>