<div class="card">
    <div class="card-body">
        <div class="table overflow-auto" tabindex="8">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('admin.content.banner.create') }}" class="btn btn-outline-success">افزودن</a>
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
                    <th class="text-center align-middle text-primary">عنوان</th>
                    <th class="text-center align-middle text-primary">عکس</th>
                    <th class="text-center align-middle text-primary">لینک</th>
                    <th class="text-center align-middle text-primary">موقعیت</th>
                    <th class="text-center align-middle text-primary"> وضعیت</th>
                    <th class="text-center align-middle text-primary">ویرایش</th>
                    <th class="text-center align-middle text-primary">حذف</th>
                    <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                        <td class="text-center align-middle">{{ $banner->title }}</td>
                        <td class="text-center align-middle">
                            <figure class="avatar avatar">
                                <img src="{{ asset($banner->image) }}" class="rounded-circle" alt="image">
                            </figure>
                        </td>
                        <td class="text-center align-middle">{{ $banner->url }}</td>                        
                        <td class="text-center align-middle"><span class="cursor-pointer badge badge-info">{{ $positions[$banner->position] }}</span></td>
                        <td class="text-center align-middle"><span wire:click="changeStatus({{ $banner->id }})" class="cursor-pointer badge @if($banner->status) badge-success @else badge-danger @endif">{{ $banner->status ? 'فعال' : 'غیرفعال' }}</span></td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="{{ route('admin.content.banner.edit', $banner->id) }}">
                                ویرایش
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <button class="btn btn-outline-danger" wire:click="deleteConfirm({{ $banner->id }})">
                                حذف
                            </button>
                        </td>
                        <td class="text-center align-middle">{{ verta($banner->created_at)->format('Y/m/d') }}</td>
                    </tr>
                    @endforeach

            </table>
            {{$banners->links()}}

        </div>
    </div>
</div>
@section('script')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('deleteBanner', (message,type) => {
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
                        Livewire.dispatch('delete',{id: message.bannerId});
                    }
                })
            })
        })
    </script>
@endsection
