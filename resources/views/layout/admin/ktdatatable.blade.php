@push('scripts')
    <script>
        // $.fn.dataTable.moment(['MM/DD/YYYY', 'DD-MM-YYYY', 'DD-MMM-YYYY']);

        var datatable = function (col, url) {
            if (typeof url == 'undefined')
                url = '{{url()->current()}}';
            datatableTable = $('#kt_datatable').KTDatatable({
                // datasource definition
                data: {
                    type: 'remote',
                    source: {
                        read: {
                            url: url,
                            method: 'get',
                            params: $('#search-form').serialize(),
                            // sample custom headers
                            // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                            map: function (raw) {
                                console.log(raw)
                                // sample data mapping
                                var dataSet = raw;
                                if (typeof raw.data !== 'undefined') {
                                    dataSet = raw.data;
                                }
                                return dataSet;
                            },
                        },
                    },
                    pageSize: 10,
                    serverPaging: true,
                    serverFiltering: true,
                    serverSorting: true,
                },

                // layout definition
                layout: {
                    scroll: false,
                    footer: false,
                },

                // column sorting
                sortable: true,

                pagination: true,

                search: {
                    input: $('#query'),
                    key: 'query'
                },

                // columns definition

                columns: [{
                    field: 'id',
                    title: '#',
                    sortable: true,
                    type: 'number',
                    selector: false,
                    textAlign: 'center',
                },
                    ...col
                    , {
                        field: "created_at",
                        title: 'تاريخ الإنشاء',

                        template: function (row) {
                            console.log(row)
                            var day = moment(row.created_at, 'YYYY-MM-DDThh:mm:ss.sZ');

                            return "<span style='direction:ltr;display:inline-block' > " + day.format('YYYY-MM-DD hh:mm:ss') + " </span>";
                            // return 'asd';
                        },
                        // type: 'date',
                        // format: 'YYYY-MM-DD',
                    }
                    // , {
                    //     field: 'Type',
                    //     title: 'Type',
                    //     autoHide: false,
                    //     // callback function support for column rendering
                    //     template: function (row) {
                    //         var status = {
                    //             1: {
                    //                 'title': 'Online',
                    //                 'state': 'danger'
                    //             },
                    //             2: {
                    //                 'title': 'Retail',
                    //                 'state': 'primary'
                    //             },
                    //             3: {
                    //                 'title': 'Direct',
                    //                 'state': 'success'
                    //             },
                    //         };
                    //         return '<span class="label label-' + status[row.Type].state + ' label-dot mr-2"></span><span class="font-weight-bold text-' + status[row.Type].state + '">' +
                    //             status[row.Type].title + '</span>';
                    //     },
                    // },
                    , {
                        field: 'Actions',
                        title: 'خيارات',
                        sortable: false,
                        width: 125,
                        overflow: 'visible',
                        autoHide: false,
                        template: function (row) {

                            let html = '';
                            @if(!isset($options['edit']))
                                html += '<a href="{{$prefix=='admin.'?"admin":""}}/{{$route}}/' + row.id + '/edit" data-id="' + row.id + '" data-title="' + row.title + '" class="btn btn-sm btn-clean btn-icon mr-2 @if(isset($isOneField)&&$isOneField) one-field-edit @endif" title="تعديل">\
                            <span class="svg-icon svg-icon-md">\
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
                                        <rect x="0" y="0" width="24" height="24"/>\
                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
                                    </g>\
                                </svg>\
                            </span>\
                        </a>';

                            @endif

                                @if(@$options['actions'])
                                @foreach($options['actions'] as $action)
                                html += '<a href="{{$prefix=='admin.'?"admin":""}}/{{$route}}/' + row.id + '/{{$action['path']}}" \
                                class="btn btn-sm btn-clean btn-icon  mr-2  {{$action['class']??''}}" title="{{$action['title']??''}}" >\
                                <span class="svg-icon svg-icon-2x svg-icon-{{$action['color']??'primary'}}">\
                                {!!  $action['svg']!!}\
                                </span>\
                                </a>';
                            @endforeach
                                @endif

                                @if(!isset($options['destroy']))

                                html += '<a href="{{$prefix=='admin.'?"admin":""}}/{{$route}}/' + row.id + '" class="btn btn-sm btn-clean btn-icon mr-2 destroy" title="حذف">' +
                                '<span class="svg-icon svg-icon-danger svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Communication\Delete-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">' +
                                '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">' +
                                '<polygon points="0 0 24 0 24 24 0 24"/>' +
                                '<path d="M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z M21,8 L17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L21,6 C21.5522847,6 22,6.44771525 22,7 C22,7.55228475 21.5522847,8 21,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>' +
                                '<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>' +
                                '</g>' +
                                '</svg><!--end::Svg Icon--></span>\
                                </a>';
                            @endif
                                return html;
                        },
                    }
                ],
                translate: {
                    records: {
                        noRecords: "لا يوجد بيانات",
                        processing: "الرجاء الإنتظار",
                    },
                    toolbar: {
                        pagination: {
                            items: {
                                default: {
                                    first: 'الأول',
                                    prev: 'السابق',
                                    next: 'التالي',
                                    last: 'الأخير',
                                    more: 'المزيد',
                                    input: 'رقم الصفحة',
                                    select: 'عدد العناصر'
                                },
                                info: "عرض \{\{start\}\} - \{\{end\}\} من \{\{total\}\} سجل"
                            }
                        }
                    }
                }
                ,
                extensions: {
                    // boolean or object (extension options)
                    checkbox: {
                        vars: {
                            selectedAllRows: 'selectedAllRows',
                            requestIds: 'requestIds',
                            rowIds: 'meta.rowIds',
                        },
                    },
                }
            });

            $('#kt_datatable_search_status').on('change', function () {
                datatableTable.search($(this).val().toLowerCase(), 'Status');
            });

            $('#kt_datatable_search_type').on('change', function () {
                datatableTable.search($(this).val().toLowerCase(), 'Type');
            });

            datatableTable.on(
                'datatable-on-layout-updated',
                function () {
                    $('[data-switch=true]').bootstrapSwitch();
                }
            );
            datatableTable.on(
                'datatable-on-click-checkbox',
                function (e) {
                    // datatable.checkbox() access to extension methods
                    var ids = datatableTable.checkbox().getSelectedId();
                    var count = ids.length;

                    $('#kt_datatable_selected_records_2').html(count);

                    if (count > 0) {
                        $('#kt_datatable_group_action_form_2').collapse('show');
                    } else {
                        $('#kt_datatable_group_action_form_2').collapse('hide');
                    }
                });

            $('#kt_datatable_fetch_modal_2').on('show.bs.modal', function (e) {
                var ids = datatableTable.checkbox().getSelectedId();
                var c = document.createDocumentFragment();
                for (var i = 0; i < ids.length; i++) {
                    var li = document.createElement('li');
                    li.setAttribute('data-id', ids[i]);
                    li.innerHTML = 'Selected record ID: ' + ids[i];
                    c.appendChild(li);
                }
                $('#kt_datatable_fetch_display_2').append(c);
            }).on('hide.bs.modal', function (e) {
                $('#kt_datatable_fetch_display_2').empty();
            });

            $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
        };
        $('body').on('change', '.status', function () {
            let href = 'admin/' + $(this).data('action') + '/' + $(this).data('id') + "/change-status"
            $.get(href).done(function (data) {
                if (data.status)
                    toastr.success('تم تغير الحالة بنجاح');
                else
                    toastr.error(data.msg);
            }).fail(function (data){
                ajaxFail(data);
            });
        })
    </script>
@endpush
