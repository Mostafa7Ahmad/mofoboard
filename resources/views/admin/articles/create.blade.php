@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 ">
            <form id="validate-form" class="row" enctype="multipart/form-data" method="POST"
                action="{{ route('admin.articles.store') }}">
                @csrf
                <input type="hidden" name="temp_file_selector" id="temp_file_selector" value="{{ uniqid() }}">
                <div class="col-12 col-lg-8 p-0 main-box">
                    <div class="col-12 px-0">
                        <div class="col-12 px-3 py-3">
                            <span class="fas fa-info-circle mx-2"></span> إضافة جديد
                        </div>
                        <div class="col-12 divider" style="min-height: 2px;"></div>
                    </div>
                    <div class="col-12 p-3 row">
                        {{-- القسم --}}
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <span>القسم</span>
                            </div>
                            <div class="col-12 pt-3">
                                <select class="form-control select2-select" name="category_id[]" required multiple
                                    size="1" style="height:30px;opacity: 0;">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if (old('category_id') == $category->id) selected @endif>{{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- الوسوم --}}
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <span>الوسوم</span>
                            </div>
                            <div class="col-12 pt-3 d-flex">
                                <select class="form-control select2-select" name="tag_id[]" id="tagsInput" multiple
                                    size="1" style="height:30px;opacity: 0;">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-sm btn-warning ai-btn text-white"
                                    style="border-radius: 0px;width: 50px;" id="generateTags">
                                    <i class="fas fa-bolt"></i>
                                </button>
                            </div>
                        </div>

                        {{-- الرابط --}}
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <span>الرابط</span>
                            </div>
                            <div class="col-12 pt-3">
                                <div class="input-group">
                                    <input type="text" name="slug" id="slugInput" required maxlength="190"
                                        class="form-control" value="{{ old('slug') }}">
                                    <button type="button" class="btn btn-warning text-white ai-btn" id="generateSlug">
                                        <i class="fas fa-bolt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- العنوان --}}
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <span>العنوان</span>
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title" id="titleInput" required maxlength="190"
                                    class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>

                        {{-- الصورة --}}
                        <div class="col-12 p-2">
                            <div class="col-12">الصورة الرئيسية</div>
                            <div class="col-12 pt-3">
                                <input type="file" name="main_image" class="filepond" accept="image/*">
                            </div>
                        </div>

                        {{-- الوصف --}}
                        <div class="col-12  p-2">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <span>الوصف</span>
                                <button type="button" class="btn btn-sm btn-warning ai-btn text-white"
                                    id="generateDescription">
                                    <i class="fas fa-bolt"></i>
                                </button>
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="description" id="descInput" class="editor with-file-explorer">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        {{-- ميتا الوصف --}}
                        <div class="col-12 p-2">
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <span>ميتا الوصف</span>
                                <button type="button" class="btn btn-sm btn-warning ai-btn text-white" id="generateMeta">
                                    <i class="fas fa-bolt"></i>
                                </button>
                            </div>
                            <div class="col-12 pt-3">
                                <textarea name="meta_description" id="metaInput" class="form-control" style="min-height:150px">{{ old('meta_description') }}</textarea>
                            </div>
                        </div>

                        {{-- مميز --}}
                        <div class="col-12 p-2">
                            <div class="col-12">مميز</div>
                            <div class="col-12 pt-3">
                                <select class="form-control" name="is_featured">
                                    <option @if (old('is_featured') == '0') selected @endif value="0">لا</option>
                                    <option @if (old('is_featured') == '1') selected @endif value="1">نعم</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- زر الحفظ --}}
                <div class="col-12 p-3">
                    <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // الأحداث

        document.getElementById('generateMeta').addEventListener('click', function() {
            callAiGenerate("meta", "#metaInput", "#titleInput", false, "generateMeta");
        });

        document.getElementById('generateDescription').addEventListener('click', function() {
            callAiGenerate("description", "#descInput", "#titleInput", false, "generateDescription");
        });

        document.getElementById('generateTags').addEventListener('click', function() {
            callAiGenerate("tags", "#tagsInput", "#titleInput", true, "generateTags");
        });

        document.getElementById('generateSlug').addEventListener('click', function() {
            callAiGenerate("slug", "#slugInput", "#titleInput", false, "generateSlug");
        });
    </script>
@endsection
