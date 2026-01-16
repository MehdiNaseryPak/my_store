<div class="card">
    <div class="card-body">
        <div class="table overflow-auto" tabindex="8">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('admin.market.product.create') }}" class="btn btn-outline-success">افزودن</a>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control text-left" dir="rtl" wire:model.live="search">
                </div>

            </div>
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                <tr>
                    <th class="text-center align-middle text-primary">ردیف</th>
                    <th class="text-center align-middle text-primary">نام</th>
                    <th class="text-center align-middle text-primary">نامک</th>
                    <th class="text-center align-middle text-primary">دسته بندی</th>
                    <th class="text-center align-middle text-primary">برند</th>
                    <th class="text-center align-middle text-primary">قیمت</th>
                    <th class="text-center align-middle text-primary">وزن</th>
                    <th class="text-center align-middle text-primary">طول</th>
                    <th class="text-center align-middle text-primary">عرض</th>
                    <th class="text-center align-middle text-primary">ارتفاع</th>
                    <th class="text-center align-middle text-primary">عکس</th>
                    <th class="text-center align-middle text-primary">وضعیت</th>
                    <th class="text-center align-middle text-primary">قابل فروش</th>
                    <th class="text-center align-middle text-primary">ویرایش</th>
                    <th class="text-center align-middle text-primary">حذف</th>
                    <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                        <td class="text-center align-middle">{{ $product->name }}</td>
                        <td class="text-center align-middle">{{ $product->slug }}</td>
                        <td class="text-center align-middle">{{ $product->category->name }}</td>
                        <td class="text-center align-middle">{{ $product->brand->persian_name }}</td>
                        <td class="text-center align-middle">{{ $product->price }}</td>
                        <td class="text-center align-middle">{{ $product->weight }}</td>
                        <td class="text-center align-middle">{{ $product->length }}</td>
                        <td class="text-center align-middle">{{ $product->width }}</td>
                        <td class="text-center align-middle">{{ $product->height }}</td>
                        <td class="text-center align-middle">
                            <figure class="avatar avatar">
                                <img src="{{ asset($product->image['indexArray']['small'] ) }}" class="rounded-circle" alt="image">
                            </figure>
                        </td>
                        <td class="text-center align-middle"><span wire:click="changeStatus({{ $product->id }})" class="cursor-pointer badge @if($product->status) badge-success @else badge-danger @endif">{{ $product->status ? 'فعال' : 'غیرفعال' }}</span></td>
                        <td class="text-center align-middle"><span wire:click="changeMarketable({{ $product->id }})" class="cursor-pointer badge @if($product->marketable) badge-success @else badge-danger @endif">{{ $product->marketable ? 'فعال' : 'غیرفعال' }}</span></td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="{{ route('admin.market.product.edit', $product->id) }}">
                                ویرایش
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <button class="btn btn-outline-danger" wire:click="deleteConfirm({{ $product->id }})">
                                حذف
                            </button>
                        </td>
                        <td class="text-center align-middle">{{ verta($product->created_at)->format('Y/m/d') }}</td>
                    </tr>
                    @endforeach

            </table>
            {{$products->links()}}

        </div>
    </div>
</div>
@section('script')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('deleteProduct', (message,type) => {
                Swal.fire({
                    title: 'آیا مطمئن هستید؟',
                    text: "این عملیات قابل بازگشت نیست!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'بله حذف کن',
                    cancelButtonText: 'خیر'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete',{id: message.productId});
                    }
                })
            })
        })
    </script>
@endsection
