<div class="card">
    <div class="card-body">
        <div class="table overflow-auto" tabindex="8">
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
                    <th class="text-center align-middle text-primary">عنوان فارسی</th>
                    <th class="text-center align-middle text-primary">عنوان انگلیسی</th>
                    <th class="text-center align-middle text-primary">خلاصه فارسی</th>
                    <th class="text-center align-middle text-primary">خلاصه انگلیسی</th>
                    <th class="text-center align-middle text-primary">عکس</th>
                    <th class="text-center align-middle text-primary">ویرایش</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->iteration }}</td>
                        <td class="text-center align-middle">{{ $profile->title_fa }}</td>
                        <td class="text-center align-middle">{{ $profile->title_en }}</td>
                        <td class="text-center align-middle">{{ $profile->summary_fa }}</td>
                        <td class="text-center align-middle">{{ $profile->summary_en }}</td>
                        <td class="text-center align-middle">
                            <figure class="avatar avatar">
                                <img src="{{ asset($profile->image) }}" class="rounded-circle" alt="image">
                            </figure>
                        </td>
                    
                        <td class="text-center align-middle">
                            <a class="btn btn-outline-info" href="{{ route('admin.profile.edit', $profile->id) }}">
                                ویرایش
                            </a>
                        </td>
                        
                    </tr>
                    @endforeach

            </table>

        </div>
    </div>
</div>

