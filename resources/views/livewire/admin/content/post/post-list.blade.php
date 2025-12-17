<div class="card">
    <div class="card-body">
        <div class="table overflow-auto" tabindex="8">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('admin.content.post.create') }}" class="btn btn-outline-success">افزودن</a>
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
                    <th class="text-center align-middle text-primary">نامک</th>
                    <th class="text-center align-middle text-primary">خلاصه</th>
                    <th class="text-center align-middle text-primary">عکس</th>
                    <th class="text-center align-middle text-primary"> وضعیت</th>
                    <th class="text-center align-middle text-primary">کامنت گذاری</th>
                    <th class="text-center align-middle text-primary">ویرایش</th>
                    <th class="text-center align-middle text-primary">حذف</th>
                    <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                        <td class="text-center align-middle">{{ $post->title }}</td>
                        <td class="text-center align-middle">{{ $post->slug }}</td>
                        <td class="text-center align-middle" title="{{$post->summary}}">{{ Str::limit($post->summary,20) }}</td>
                        <td class="text-center align-middle">
                            <figure class="avatar avatar">
                                @if($post->image)
                                <img src="{{ asset($post->image['indexArray'][$post->image['currentImage']] ) }}" class="rounded-circle" alt="image">
                                @endif
                            </figure>
                        </td>                        
                        <td class="text-center align-middle"><span wire:click="changeStatus({{ $post->id }})" class="cursor-pointer badge @if($post->status) badge-success @else badge-danger @endif">{{ $post->status ? 'فعال' : 'غیرفعال' }}</span></td>
                        <td class="text-center align-middle"><span wire:click="changeCommentable({{ $post->id }})" class="cursor-pointer badge @if($post->commentable) badge-success @else badge-danger @endif">{{ $post->commentable ? 'فعال' : 'غیرفعال' }}</span></td>
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="{{ route('admin.content.post.edit', $post->id) }}">
                                ویرایش
                            </a>
                        </td>
                        <td class="text-center align-middle">
                            <button class="btn btn-outline-danger" wire:click="deleteConfirm({{ $post->id }})">
                                حذف
                            </button>
                        </td>
                        <td class="text-center align-middle">{{ verta($post->created_at)->format('Y/m/d') }}</td>
                    </tr>
                    @endforeach

            </table>
            {{$posts->links()}}

        </div>
    </div>
</div>
@section('script')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('deletePost', (message,type) => {
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
                        Livewire.dispatch('delete',{id: message.postId});
                    }
                })
            })
        })
    </script>
@endsection
