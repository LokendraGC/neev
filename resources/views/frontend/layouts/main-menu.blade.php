@inject('frontMenuRepository', 'App\Repositories\FrontMenuRepository')
@php
    $segment = request()->segment(1);
@endphp

@php
    $menu = CategoryHelper::getModel()
        ->where(['id' => 8, 'type' => 'nav_menu'])
        ->first();
@endphp

@php
    // dd($menu);
@endphp

@if ($menu)
    @php
        $allMenuItems = $menu->posts;
        $allMenuItems = $parentMenuItems = $allMenuItems
            ->filter(function ($item) {
                return $item->postMeta->contains(function ($meta) {
                    return $meta->meta_key === 'menu_item_parent_id' && $meta->meta_value === '0';
                });
            })
            ->sortBy('menu_order');
        // dd($allMenuItems);
    @endphp


        <ul>
            @if ($allMenuItems)
                @foreach ($allMenuItems as $depth_0)
                    @php
                        $menuItemMeta = $depth_0->GetAllMetaData();
                    @endphp
                    @if ($menuItemMeta['menu_item_object'] != 'custom')
                        @php
                            $menuItem = $frontMenuRepository->checkTypeOfMenuItem(
                                $menuItemMeta['menu_item_object'],
                                $depth_0,
                                $menuItemMeta,
                            );
                        @endphp

                        @if ($menuItem)
                            @php
                                $hasChildren = $frontMenuRepository->menuItemHasChildren($depth_0);
                            @endphp

                            <li class="{{ $hasChildren ? '' : '' }}">
                                <a href="{{ $menuItem['link'] }}" class="{{ $menuItem['css'] }}"
                                    target="{{ $menuItem['target'] }}">
                                    {{ $menuItem['title'] }}
                                    @if ($hasChildren)
                                        <i class="ti ti-chevron-down"></i>
                                    @endif
                                </a>

                                @if ($hasChildren)
                                    <div class="dropdown-toggler"><i class="bi bi-caret-down-fill"></i></div>

                                    <ul class="submenu">
                                        @foreach ($hasChildren as $depth_1)
                                            @php
                                                $menuItemMeta = $depth_1->GetAllMetaData();
                                                $menuItem = $frontMenuRepository->checkTypeOfMenuItem(
                                                    $menuItemMeta['menu_item_object'],
                                                    $depth_1,
                                                    $menuItemMeta,
                                                );
                                                $hasChildren_1 = $menuItem
                                                    ? $frontMenuRepository->menuItemHasChildren($depth_1)
                                                    : false;
                                            @endphp

                                            @if ($menuItem)
                                                <li class="{{ $hasChildren_1 ? '' : '' }}">
                                                    <a href="{{ $menuItem['link'] }}" class="{{ $menuItem['css'] }}"
                                                        target="{{ $menuItem['target'] }}">
                                                        {{ $menuItem['title'] }}
                                                        @if ($hasChildren_1)
                                                            <i class="ti ti-chevron-down"></i>
                                                        @endif
                                                    </a>

                                                    @if ($hasChildren_1)
                                                        <div class="dropdown-toggler"><i
                                                                class="bi bi-caret-down-fill"></i></div>

                                                        <ul class="submenu">
                                                            @foreach ($hasChildren_1 as $depth_2)
                                                                @php
                                                                    $menuItemMeta = $depth_2->GetAllMetaData();
                                                                    $menuItem = $frontMenuRepository->checkTypeOfMenuItem(
                                                                        $menuItemMeta['menu_item_object'],
                                                                        $depth_2,
                                                                        $menuItemMeta,
                                                                    );
                                                                    $hasChildren_2 = $menuItem
                                                                        ? $frontMenuRepository->menuItemHasChildren(
                                                                            $depth_2,
                                                                        )
                                                                        : false;
                                                                @endphp

                                                                @if ($menuItem)
                                                                    <li
                                                                        class="{{ $hasChildren_2 ? '' : '' }}">
                                                                        <a href="{{ $menuItem['link'] }}"
                                                                            class="{{ $menuItem['css'] }}"
                                                                            target="{{ $menuItem['target'] }}">
                                                                            {{ $menuItem['title'] }}
                                                                            @if ($hasChildren_2)
                                                                                <i class="ti ti-chevron-down"></i>
                                                                            @endif
                                                                        </a>

                                                                        @if ($hasChildren_2)
                                                                            <div class="dropdown-toggler"><i
                                                                                    class="bi bi-caret-down-fill"></i>
                                                                            </div>

                                                                            <ul class="submenu">
                                                                                @foreach ($hasChildren_2 as $depth_3)
                                                                                    @php
                                                                                        $menuItemMeta = $depth_3->GetAllMetaData();
                                                                                        $menuItem = $frontMenuRepository->checkTypeOfMenuItem(
                                                                                            $menuItemMeta[
                                                                                                'menu_item_object'
                                                                                            ],
                                                                                            $depth_3,
                                                                                            $menuItemMeta,
                                                                                        );
                                                                                    @endphp

                                                                                    @if ($menuItem)
                                                                                        <li>
                                                                                            <a href="{{ $menuItem['link'] }}"
                                                                                                class="{{ $menuItem['css'] }}"
                                                                                                target="{{ $menuItem['target'] }}">
                                                                                                {{ $menuItem['title'] }}
                                                                                            </a>
                                                                                        </li>
                                                                                    @endif
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @else
                        {{-- custom --}}
                        @php
                            $menuItem = $frontMenuRepository->checkTypeOfMenuItem(
                                $menuItemMeta['menu_item_object'],
                                $depth_0,
                                $menuItemMeta,
                            );
                        @endphp
                        @if ($menuItem)
                            @php
                                $hasChildren_0 = $frontMenuRepository->menuItemHasChildren($depth_0);
                            @endphp
                            <li class="{{ $hasChildren_0 ? '' : '' }}">
                                <a href="{{ $menuItem['link'] }}" class="{{ $menuItem['css'] }}"
                                    target="{{ $menuItem['target'] }}">{{ $menuItem['title'] }}
                                    @if ($hasChildren_0)
                                        {!! '<i class="ti ti-chevron-down"></i>' !!}
                                    @endif
                                </a>

                                @if ($hasChildren_0)
                                    <div class="dropdown-toggler"><i class="bi bi-caret-down-fill"></i></div>
                                @endif

                                @if ($hasChildren_0)
                                    <ul class="submenu">
                                        @foreach ($hasChildren_0 as $depth_1)
                                            @php
                                                $menuItemMeta = $depth_1->GetAllMetaData();
                                                $menuItem = $frontMenuRepository->checkTypeOfMenuItem(
                                                    $menuItemMeta['menu_item_object'],
                                                    $depth_1,
                                                    $menuItemMeta,
                                                );
                                            @endphp

                                            @if ($menuItem)
                                                @php
                                                    $hasChildren_1 = $frontMenuRepository->menuItemHasChildren(
                                                        $depth_1,
                                                    );

                                                @endphp

                                                <li class="{{ $hasChildren_1 ? '' : '' }}">
                                                    <a href="{{ $menuItem['link'] }}" class="{{ $menuItem['css'] }}"
                                                        target="{{ $menuItem['target'] }}">{{ $menuItem['title'] }}
                                                        @if ($hasChildren_1)
                                                            {!! '<i class="ti ti-chevron-down"></i>' !!}
                                                        @endif
                                                    </a>

                                                    @if ($hasChildren_1)
                                                        <div class="dropdown-toggler"><i
                                                                class="bi bi-caret-down-fill"></i></div>
                                                    @endif


                                                    @if ($hasChildren_1)
                                                        <ul class="submenu">
                                                            @foreach ($hasChildren_1 as $depth_2)
                                                                @php
                                                                    $menuItemMeta = $depth_2->GetAllMetaData();
                                                                    $menuItem = $frontMenuRepository->checkTypeOfMenuItem(
                                                                        $menuItemMeta['menu_item_object'],
                                                                        $depth_2,
                                                                        $menuItemMeta,
                                                                    );
                                                                @endphp
                                                                @if ($menuItem)
                                                                    <li>
                                                                        <a href="{{ $menuItem['link'] }}"
                                                                            class="{{ $menuItem['css'] }}"
                                                                            target="{{ $menuItem['target'] }}">{{ $menuItem['title'] }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endif
                @endforeach
            @endif
        </ul>
@endif

