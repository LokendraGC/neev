@inject('frontMenuRepository', 'App\Repositories\FrontMenuRepository')


@if ($footerMenu)
    @php
        $allMenuItems = $footerMenu->posts;
        $parentMenuItems = $allMenuItems
            ->filter(function ($item) {
                return $item->postMeta->contains(function ($meta) {
                    return $meta->meta_key === 'menu_item_parent_id' && $meta->meta_value === '0';
                });
            })
            ->sortBy('menu_order');

    @endphp
    @if ($parentMenuItems)
    <ul class="gt-list-area">
            @foreach ($parentMenuItems as $menu)
                @php
                    $menuItemMeta = $menu->GetAllMetaData();
                    $menuItem = $frontMenuRepository->checkTypeOfMenuItem(
                        $menuItemMeta['menu_item_object'],
                        $menu,
                        $menuItemMeta,
                    );
                @endphp
                @if ($menuItem)
                    <li>
                        <a href="{{ $menuItem['link'] }}" class="{{ $menuItem['css'] }}"
                            target="{{ $menuItem['target'] }}">{{ $menuItem['title'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    @endif
@endif