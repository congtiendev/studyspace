@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ $pageTitle }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/">{{trans('admin/main.dashboard')}}</a>
                </div>
                <div class="breadcrumb-item">{{ $pageTitle}}</div>
            </div>
        </div>

<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-pen"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bài tập khóa học</font></font></h4>
                        </div>
                        <div class="card-body"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            2
                        </font></font></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-eye"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đang chờ xem xét</font></font></h4>
                        </div>
                        <div class="card-body"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            0
                        </font></font></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-check"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đi qua</font></font></h4>
                        </div>
                        <div class="card-body"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            1
                        </font></font></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-times"></i></div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Thất bại</font></font></h4>
                        </div>
                        <div class="card-body"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            2
                        </font></font></div>
                    </div>
                </div>
            </div>
        </div>







        <div class="section-body">
            <section class="card">
                <div class="card-body">
                    <form method="get" class="mb-0">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ngày bắt đầu</font></font></label>
                                    <div class="input-group">
                                        <input type="date" id="fsdate" class="text-center form-control" name="from" value="" placeholder="Ngày bắt đầu">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ngày cuối</font></font></label>
                                    <div class="input-group">
                                        <input type="date" id="lsdate" class="text-center form-control" name="to" value="" placeholder="Ngày cuối">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="input-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Khóa học</font></font></label>
                                    <select name="webinar_ids[]" multiple="" class="form-control search-webinar-select2 select2-hidden-accessible" data-placeholder="Search classes" data-select2-id="select2-data-1-cak6" tabindex="-1" aria-hidden="true">

                                                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="select2-data-2-sc3r" style="width: 366.4px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered" id="select2-webinar_ids-it-container"></ul><span class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-describedby="select2-webinar_ids-it-container" placeholder="Tìm kiếm lớp học" style="width: 100%;"></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="input-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trạng thái</font></font></label>
                                    <select name="status" class="form-control populate">
                                        <option value=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tất cả</font></font></option>
                                        <option value="active"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tích cực</font></font></option>
                                        <option value="inactive"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Vô hiệu hóa</font></font></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group mt-1">
                                    <label class="input-label mb-4"> </label>
                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input type="submit" class="text-center btn btn-primary w-100" value="Hiển thị kết quả"></font></font>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </section>

            <section class="card">
                <div class="card-body">
                    <table class="table table-striped font-14" id="datatable-details">

                        <tbody><tr>
                            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tiêu đề/Khóa học</font></font></th>
                            <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Sinh viên</font></font></th>
                            <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cấp</font></font></th>
                            <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Đạt lớp</font></font></th>
                            <th class="text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trạng thái</font></font></th>
                            <th class="text-right"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hoạt động</font></font></th>
                        </tr>

                                                    <tr>
                                <td class="text-left">
                                    <span class="d-block font-16 font-weight-500 text-dark-blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bài tập về nhà giữa kỳ</font></font></span>
                                    <span class="d-block font-12 font-weight-500 text-gray"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Trang học tập mới</font></font></span>
                                </td>

                                <td class="align-middle">
                                    <span class="font-weight-500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">1</font></font></span>
                                </td>

                                <td class="align-middle">
                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></span>
                                </td>

                                <td class="align-middle">
                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">75</font></font></span>
                                </td>

                                <td class="align-middle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Tích cực
                                </font></font></td>

                                <td class="align-middle text-right">
                                                                            <a href="/admin/assignments/2/students" class="btn-transparent text-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Students">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    
                                    <a href="/admin/webinars/2008/edit" target="_blank" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Course">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                                                    <tr>
                                <td class="text-left">
                                    <span class="d-block font-16 font-weight-500 text-dark-blue"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bài tập của học sinh</font></font></span>
                                    <span class="d-block font-12 font-weight-500 text-gray"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tính năng cập nhật mới</font></font></span>
                                </td>

                                <td class="align-middle">
                                    <span class="font-weight-500"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">3</font></font></span>
                                </td>

                                <td class="align-middle">
                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">100</font></font></span>
                                </td>

                                <td class="align-middle">
                                    <span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">70</font></font></span>
                                </td>

                                <td class="align-middle"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Tích cực
                                </font></font></td>

                                <td class="align-middle text-right">
                                                                            <a href="/admin/assignments/1/students" class="btn-transparent text-primary mr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Students">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    
                                    <a href="/admin/webinars/2010/edit" target="_blank" class="btn-transparent text-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Course">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        
                    </tbody></table>
                </div>
            </section>
        </div>
    </section>





@endsection

@push('scripts_bottom')

@endpush
