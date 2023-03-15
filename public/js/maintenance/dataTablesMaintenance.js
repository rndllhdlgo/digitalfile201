    var companyTable = $('#companyTable').DataTable({
        dom: 'lf<"breakspace">trip',
        language:{
            "info": "\"Showing _START_ to _END_ of _TOTAL_ Companies\"",
            "lengthMenu":"Show _MENU_ Companies",
            "emptyTable":"No Companies Data Found!",
            "loadingRecords": "Loading Companies Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax: {
            url: '/maintenance/companyData',
        },
        order: [],
        columns: [
            {data: 'company_name'}
        ],
        initComplete: function(){
            $('#loading').hide();
        }
    });

    $('div.breakspace').html('<br><br>');

    var departmentTable = $('#departmentTable').DataTable({
        dom: 'lf<"breakspace">trip',
        language:{
            "info": "\"Showing _START_ to _END_ of _TOTAL_ Departments\"",
            "lengthMenu":"Show _MENU_ Departments",
            "emptyTable":"No Departments Data Found!",
            "loadingRecords": "Loading Departments Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax: {
            url: '/maintenance/departmentData',
        },
        order: [],
        columns: [
            {data: 'department'}
        ],
        initComplete: function(){
            $('#loading').hide();
        }
    });
    $('div.breakspace').html('<br><br>');

    var branchTable = $('#branchTable').DataTable({
        dom: 'lf<"breakspace">trip',
        language:{
            "info": "\"Showing _START_ to _END_ of _TOTAL_ Branches\"",
            "lengthMenu":"Show _MENU_ Branches",
            "emptyTable":"No Branches Data Found!",
            "loadingRecords": "Loading Branches Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax: {
            url: '/maintenance/branchData',
        },
        order: [],
        columns: [
            {data: 'branch_name'}
        ],
        initComplete: function(){
            $('#loading').hide();
        }
    });
    $('div.breakspace').html('<br><br>');

    var shiftTable = $('table.shiftTable').DataTable({
            dom: 'lf<"breakspace">trip',
            language: {
                info: "\"Showing _START_ to _END_ of _TOTAL_ Shifts\"",
                lengthMenu: "Show _MENU_ Shifts",
                emptyTable: "No Shifts Data Found!",
            },
            processing:true,
            serverSide:false,
            ajax: {
                url: '/maintenance/shiftData',
            },
            order: [],
            columns: [
                {data: 'shift_code'},
                {data: 'shift_working_hours'},
                {data: 'shift_break_time'}
            ],
            initComplete: function(){
                $('#loading').hide();
            }
        });
        $('div.breakspace').html('<br><br>');

    $('.filter-input').on('keyup search', function(){
        shiftTable.column($(this).data('column')).search($(this).val()).draw();
    });

    var supervisorTable = $('#supervisorTable').DataTable({
        dom: 'lf<"breakspace">trip',
        language:{
            "info": "\"Showing _START_ to _END_ of _TOTAL_ Supervisors\"",
            "lengthMenu":"Show _MENU_ Supervisors",
            "emptyTable":"No Supervisors Data Found!",
            "loadingRecords": "Loading Supervisors Records...",
        },
        aLengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        processing:true,
        serverSide:false,
        ajax: {
            url: '/maintenance/supervisorData',
        },
        order: [],
        columns: [
            {data: 'supervisor_name'}
        ],
        initComplete: function(){
            $('#loading').hide();
        }
    });
    $('div.breakspace').html('<br><br>');

    var jobPositionAndDescriptionTable = $('table.jobPositionAndDescriptionTable').DataTable({
        dom: 'lf<"breakspace">trip',
            language: {
                info: "\"Showing _START_ to _END_ of _TOTAL_ Job Positions, Descriptions, Skills\"",
                lengthMenu: "Show _MENU_ Job Positions",
                emptyTable: "No Job Positions Data Found!",
            },
            processing:true,
            serverSide:false,
            ajax: {
                url: '/maintenance/jobPositionAndDescriptionData',
            },
            order: [],
            columns: [
                {data: 'job_position_name'},
                {
                    data: 'job_description',
                    "render":function(data,type,row){
                    var job_description = '';
                    if (row.job_description !== null && row.job_description !== undefined) {
                        job_description = row.job_description.replace(/• /g,"<br>• ").replace(/<br>/, '');
                    }
                        return job_description;
                    },
                },
                {
                    data: 'job_requirements',
                    "render":function(data,type,row){
                    var job_requirements = '';
                    if (row.job_requirements !== null && row.job_requirements !== undefined) {
                        job_requirements = row.job_requirements.replace(/• /g,"<br>• ").replace(/<br>/, '');
                    }
                        return job_requirements;
                    },
                },
            ],
            initComplete: function(){
                $('#loading').hide();
            }
        });
        $('div.breakspace').html('<br><br>');

    $('.filter-input').on('keyup search', function(){
        jobPositionAndDescriptionTable.column($(this).data('column')).search($(this).val()).draw();
    });