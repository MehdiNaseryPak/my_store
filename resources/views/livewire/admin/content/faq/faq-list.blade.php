<div class="card">
    <div class="card-body">
        <div class="table overflow-auto" tabindex="8">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('admin.content.faq.create') }}" class="btn btn-outline-success">افزودن</a>
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
                    <th class="text-center align-middle text-primary">پرسش</th>
                    <th class="text-center align-middle text-primary">نامک</th>
                    <th class="text-center align-middle text-primary">جواب</th>
                    <th class="text-center align-middle text-primary"> وضعیت</th>
                    <th class="text-center align-middle text-primary">ویرایش</th>
                    <th class="text-center align-middle text-primary">حذف</th>
                    <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($faqs as $faq)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                        <td class="text-center align-middle">{{ $faq->question }}</td>
                        <td class="text-center align-middle">{{ $faq->slug }}</td>
                        <td class="text-center align-middle">{{ $faq->answer }}</td>                        
                        <td class="text-center align-middle"><span wire:click="changeStatus({{ $faq->id }})" class="cursor-pointer badge @if($faq->status) badge-success @else badge-danger @endif">{{ $faq->status ? 'فعال' : 'غیرفعال' }}</span></td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="{{ route('admin.content.faq.edit', $faq->id) }}">
                                ویرایش
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <button class="btn btn-outline-danger" wire:click="deleteConfirm({{ $faq->id }})">
                                حذف
                            </button>
                        </td>
                        <td class="text-center align-middle">{{ verta($faq->created_at)->format('Y/m/d') }}</td>
                    </tr>
                    @endforeach

            </table>
            {{$faqs->links()}}

        </div>
    </div>
</div>
@section('script')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('deleteFaq', (message,type) => {
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
                        Livewire.dispatch('delete',{id: message.faqId});
                    }
                })
            })
        })
    </script>
@endsection
