<script src="/js/inc/mdb.min.js"></script>
<script src="/js/inc/bootstrap.bundle.min.js"></script>
<script src="/js/inc2/jquery.dataTables.min.js"></script>
<script src="/js/inc/dataTables.buttons.min.js"></script>
<script src="/js/inc2/dataTables.fixedColumns.min.js"></script>
<script src="/js/inc/buttons.html5.min.js"></script>
<script src="/js/inc/jszip.min.js"></script>
<script src="/js/inc/sweetalert2.all.min.js"></script>
<script src="/js/inc/chosen.jquery.js"></script>
<script src="/js/inc/moment.js"></script>
<script src="/js/inc/datetime.js"></script>
<script src="/js/inc/printThis.js"></script>
<script src="/js/global.js?version={{\Illuminate\Support\Str::random(50)}}"></script>

@if(Request::is('/'))
    <script src="/js/index.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif

@if(Request::is('login'))
    <script src="/js/login.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif

@if(Request::is('employees'))
    <script src="/js/employees/employees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/btnAddColumn.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/btnUpdateEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/btnViewEmployees.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/btnDelete.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/uploadValidation.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/restrictions.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/employees/summary.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif

@if(Request::is('users'))
    <script src="/js/users/users.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/users/btnSaveUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/users/btnUpdateUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/users/btnViewUsers.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif

@if(Request::is('maintenance'))
    <script src="/js/maintenance/maintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/maintenance/btnSaveMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/maintenance/btnUpdateMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/maintenance/btnViewMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
    <script src="/js/maintenance/dataTablesMaintenance.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif

@if(Request::is('updates'))
    <script src="/js/updates/updates.js?version={{\Illuminate\Support\Str::random(50)}}"></script>
@endif