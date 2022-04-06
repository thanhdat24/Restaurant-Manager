<?php
$SITE = array(
  'navigation' => [
    'admin' => [
      'menu' => [
        'title' => 'Thực đơn',
        'name'  => 'menu',
        'icon'  => 'fas fa-book',
        'link'  => '?page=menu&action=index',
      ],
      'staff' => [
        'title' => 'Nhân viên',
        'name'  => 'staff',
        'icon'  => 'fas fa-user-tie',
        'link'  => '?page=staff&action=index',
      ],
      'customer' => [
        'title' => 'Khách hàng',
        'name'  => 'customer',
        'icon'  => 'fas fa-users',
        'link'  => '?page=customer&action=index',
      ],
      'order' => [
        'title' => 'Hoá đơn',
        'name'  => 'order',
        'icon'  => 'fas fa-file-invoice-dollar',
        'link'  => '?page=order&action=index',
      ],
      'statistic' => [
        'title' => 'Thống kê',
        'name'  => 'statistic',
        'icon'  => 'fas fa-chart-bar',
        'link'  => '?page=statistic&action=order',
        'subitems' => [
          [
            'title' => 'Món ăn bán chạy',
            'name'  => 'order',
            'icon'  => 'fas fa-hamburger',
            'link'  => '?page=statistic&action=order',
          ],
          [
            'title' => 'Thống kê món ăn',
            'name'  => 'menu',
            'icon'  => 'fas fa-pizza-slice',
            'link'  => '?page=statistic&action=menu',
          ],
          [
            'title' => 'Lương nhân viên',
            'name'  => 'salary',
            'icon'  => 'fas fa-money-bill-alt',
            'link'  => '?page=statistic&action=salary',
          ],
          [
            'title' => 'Thâm niên làm việc',
            'name'  => 'seniority',
            'icon'  => 'fas fa-address-card',
            'link'  => '?page=statistic&action=seniority',
          ],
        ],
      ],
    ],
  ],
);
