<div class="navigation">
    <div class="navigation-icon-menu">
        <ul>
            <li data-toggle="tooltip" title="محتوا">
                <a href="#content" title=" محتوا">
                    <i class="icon ti-image"></i>
                </a>
            </li>
            <li data-toggle="tooltip" title="مارکت">
                <a href="#market" title=" مارکت">
                    <i class="icon ti-shopping-cart-full"></i>
                </a>
            </li>
        </ul>
        <ul>
            <li data-toggle="tooltip" title="خروج">
                <a href="" class="go-to-page">
                    <i class="icon ti-power-off"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navigation-menu-body">
        <ul id="content">
            <li>
                <a href="#">دسته بندی</a>
                <ul>
                    <li><a href="{{ route('admin.content.post_category.create') }}">ایجاد دسته بندی</a></li>
                    <li><a href="{{ route('admin.content.post_category.index') }}">لیست دسته بندی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">پست</a>
                <ul>
                    <li><a href="{{ route('admin.content.post.create') }}">ایجاد پست</a></li>
                    <li><a href="{{ route('admin.content.post.index') }}">لیست پست ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">پرسش</a>
                <ul>
                    <li><a href="{{ route('admin.content.faq.create') }}">ایجاد پرسش</a></li>
                    <li><a href="{{ route('admin.content.faq.index') }}">لیست پرسش ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">منو</a>
                <ul>
                    <li><a href="{{ route('admin.content.menu.create') }}">ایجاد منو</a></li>
                    <li><a href="{{ route('admin.content.menu.index') }}">لیست منو ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">بنر</a>
                <ul>
                    <li><a href="{{ route('admin.content.banner.create') }}">ایجاد بنر</a></li>
                    <li><a href="{{ route('admin.content.banner.index') }}">لیست بنر ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">صفحه</a>
                <ul>
                    <li><a href="{{ route('admin.content.page.create') }}">ایجاد صفحه</a></li>
                    <li><a href="{{ route('admin.content.page.index') }}">لیست صفحه ها</a></li>
                </ul>
            </li>
            {{-- <li>
                <a href="#">کاربران</a>
                <ul>
                    <li><a href="{{ route('admin.content.user.index') }}">لیست کاربران</a></li>
                </ul>
            </li> --}}

        </ul>
        <ul id="market">
            <li>
                <a href="#">برند</a>
                <ul>
                    <li><a href="{{ route('admin.market.brand.create') }}">ایجاد برند</a></li>
                    <li><a href="{{ route('admin.market.brand.index') }}">لیست برند ها</a></li>
                </ul>
            </li>
            {{-- <li>
                <a href="#">دسته بندی</a>
                <ul>
                    <li><a href="{{ route('admin.market.product_category.create') }}">ایجاد دسته بندی</a></li>
                    <li><a href="{{ route('admin.market.product_category.index') }}">لیست دسته بندی ها</a></li>
                </ul>
            </li>
            <li>
                <a href="#">محصول</a>
                <ul>
                    <li><a href="{{ route('admin.market.product.create') }}">ایجاد محصول</a></li>
                    <li><a href="{{ route('admin.market.product.index') }}">لیست محصول ها</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
</div>
