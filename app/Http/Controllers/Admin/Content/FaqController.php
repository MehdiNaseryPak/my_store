<?php

namespace App\Http\Controllers\Admin\Content;

use App\Models\Content\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Faq\CreateFaqRequest;
use App\Http\Requests\Faq\UpdateFaqRequest;

class FaqController extends Controller
{
    public function index()
    {
        return view('admin.contents.faqs.index');
    }

    public function create()
    {
        return view('admin.contents.faqs.create');
    }

    public function store(CreateFaqRequest $request)
    {
        $inputs = $request->all();
        $faq = Faq::create($inputs);
        return redirect()->route('admin.content.faq.index')->with('swal-success', 'پرسش  جدید شما با موفقیت ثبت شد');
    }
    public function edit(Faq $faq)
    {
        return view('admin.contents.faqs.edit',compact('faq'));
    }
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $inputs = $request->all();
        $faq->update($inputs);
        return redirect()->route('admin.content.faq.index')->with('swal-success', 'پرسش شما با موفقیت ویرایش شد');
    }
}
