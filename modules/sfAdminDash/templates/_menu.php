<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items;
  /** @var Array of categories, each containing an array of menu items and settings */ $categories;
?>


<?php if ($sf_data->getRaw('items')): ?>
  <ul>
    <?php if (sfAdminDash::hasItemsMenu($items)): ?>
    <li class="node"><a href="#">Menu</a>
      <ul>
        <?php include_partial('sfAdminDash/menu_list', array('items' => $items, 'items_in_menu' => true)); ?>
      </ul>
    </li>
    <?php  endif; ?>
    <?php include_partial('sfAdminDash/menu_list', array('items' => $items, 'items_in_menu' => false)); ?>
  </ul>
<?php elseif ($sf_data->getRaw('categories')): ?>
  <ul>
    <?php foreach ($categories as $name => $category): ?>
    <?php   if (sfAdminDash::hasPermission($category, $sf_user)): ?>
    <?php     if(sfAdminDash::hasItemsMenu($category['items'])): ?>
    <li class="node"><a href="#"><?php echo isset($category['name']) ? $category['name'] : $name ?></a>
      <ul>
        <?php include_partial('sfAdminDash/menu_list', array('items' => $category['items'], 'items_in_menu' => true)) ?>
      </ul>
    </li>
    <?php     endif; ?>
    <?php   endif; ?>
    <?php endforeach; ?>
    <?php foreach ($categories as $name => $category): ?>
        <?php include_partial('sfAdminDash/menu_list', array('items' => $category['items'], 'items_in_menu' => false)) ?>
    <?php endforeach; ?>
  </ul>
<?php else: ?>
  sfAdminDashPlugin is not configured.  Please see <a href="http://www.symfony-project.org/plugins/sfAdminDashPlugin/0_8_1?tab=plugin_readme" title="documentation">documentation</a>.
<?php endif; ?>