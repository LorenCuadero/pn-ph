@extends('layouts.admin.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12" id="table">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center justify-content-between"
                            style="background-color:#ffffff">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="card-title mb-3 mb-md-0"
                                        style="color:#1f3c88; padding-left:0%; font-size: 22px"><b>Email Generator:
                                            Customized</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <form id="customized-email-form" enctype="multipart/form-data" method="POST"
                                        action="{{ route('admin.sendCustomized') }}">
                                        @csrf
                                        <div class="form-group row align-items-center">
                                            <p for="batchYear" class="col-sm-2 control-p"><b style="color:#1f3c88;">To:</b>
                                            </p>
                                            <div class="col-sm-10">
                                                <div class="nav-item dropdown show btn btn-sm batch-year-dropdown form-control"
                                                    style="display: flex; align-items: center; background-color: #ffff; border: 1px solid #ced4da;">
                                                    <a class="nav-link dropdown-toggle align-items-center mr-2"
                                                        data-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="true" aria-expanded="true"
                                                        style="color:#495057;height: 100%; display: flex; align-items: center; padding-left: 2%;">
                                                        {{ $selectedBatchYear ?? 'Batch year' }}
                                                    </a>
                                                    <div class="dropdown-menu mt-0" style="left: 0px; right: inherit;">
                                                        @foreach ($students->pluck('batch_year')->unique() as $year)
                                                            <a class="dropdown-item" href="#"
                                                                data-widget="iframe-close">{{ $year }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <input type="hidden" id="batch_year_selected" name="batch_year_selected">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <p for="subject" class="col-sm-2 control-p"><b
                                                    style="color:#1f3c88;">Subject:</b></p>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="subject" class="form-control" id="subject"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <p for="salutation" class="col-sm-2 control-label"><b
                                                    style="color:#1f3c88;">Salutation:</b></p>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <select name="salutation" id="salutation" class="form-control mr-1">
                                                    <option value="0">Hi</option>
                                                    <option value="1">Hello</option>
                                                    <option value="2">Dear</option>
                                                    <option value="3">Other</option>
                                                </select>
                                                <input type="text" name="otherSalutation" id="otherSalutation"
                                                    class="form-control ml-1" style="display: none;"
                                                    placeholder="Enter other salutation">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <p for="intro" class="col-sm-2 control-p"><b
                                                    style="color:#1f3c88;">Message:</b></p>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="message" class="form-control" id="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <p for="salutation" class="col-sm-2 control-label"><b
                                                    style="color:#1f3c88;">Conclusion:</b></p>
                                            <div class="col-sm-10" style="display: flex; align-items: center;">
                                                <select name="conclusion_salutation" id="conclusion_salutation"
                                                    class="form-control mr-1">
                                                    <option value="0">Sincerely</option>
                                                    <option value="1">Yours truly</option>
                                                    <option value="2">Yours sincerely</option>
                                                    <option value="3">Regards</option>
                                                    <option value="4">Kind regards</option>
                                                    <option value="5">Warm regards</option>
                                                    <option value="6">Respectfully</option>
                                                    <option value="7">Best wishes</option>
                                                    <option value="8">Yours</option>
                                                    <option value="9">Very truly yours</option>
                                                    <option value="10">Best regards</option>
                                                    <option value="11">Other</option>
                                                </select>
                                                <input type="text" name="otherConclusionSalutation"
                                                    id="otherConclusionSalutation" class="form-control ml-1"
                                                    style="display: none;" placeholder="Enter other conclusion">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <p for="recipientName" class="col-sm-2 control-p"><b
                                                    style="color:#1f3c88;">Sender:</b></p>
                                            <div class="col-sm-10">
                                                <input type="text" name="sender" class="form-control"
                                                    id="sender">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center mb-0">
                                            <p for="attachment" class="col-sm-2 control-p"><b
                                                    style="color:#1f3c88;">Attachment/s:</b></p>
                                            <div class="col-sm-10">
                                                <input name="attachment" id="attachment" type="file" accept="*">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <a href="#" id="previewLink">Preview Message</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button id="submitButton" class="btn btn-sm float-right p-2" style="background-color:#1f3c88; color:#ffffff" type="submit">Send</button>

                                                {{-- <button class="btn btn-sm float-right mr-1 p-2"
                                                    style="background-color:#1f3c88; color:#ffffff" type="submit">Save as
                                                    template</button> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-justify">
                    <div class="modal-header">
                        <h5 class="modal-title" id="previewModalLabel">Preview Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="rounded" style="background-color: #e5e5e5">
                        <div class="modal-body m-3 rounded"  style="background-color: #ffffff">
                            <div class="p-1">
                                <p>Subject: <span id="previewSubject"></span></p>
                                <p><span id="previewSalutation"></span> <span class="batchYearSelectedOnModal"></span></p>
                                <p id="previewMessage"></p>
                                <p><span id="previewConclusionSalutation"></span>,<br><span id="previewSender"></span>
                                </p>
                                <span id="previewAttachment"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('assets.asst-loading-spinner')
@endsection
