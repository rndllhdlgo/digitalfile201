<script src="/js/inc/mdb.min.js"></script>
<script src="/js/inc/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="/DataTables/datatables.min.js"></script>
<script src="/js/inc/sweetalert2.all.min.js"></script>
<script src="/js/inc/chosen.jquery.js"></script>
<script src="/js/inc/moment.js"></script>
<script src="/js/inc/datetime.js"></script>
<script src="/js/inc/printThis.js"></script>
<script src="/js/inc/xlsx.full.min.js"></script>
<script src="/js/inc/FileSaver.min.js"></script>
<script src="/js/global.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
<script src="/js/tab.js?version={{\Illuminate\Support\Str::random(50)}}"></script>

@if(Request::is('/'))
    <script src="/js/index.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif

@if(Request::is('employees'))
    <script src="/js/employees/employees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/uploadImage.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/btnAddRows.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/btnUpdateEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/btnViewEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/btnDelete.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/uploadValidation.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/restrictions.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/summary.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/tables.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif

@if(Request::is('users'))
    <script src="/js/users/users.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/users/btnSaveUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/users/btnUpdateUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/users/btnViewUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif

@if(Request::is('maintenance'))
    <script src="/js/maintenance/maintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/maintenance/dataTablesMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif