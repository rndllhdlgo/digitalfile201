<div id="position_div" class="tab-pane fade" style="border-radius:0px;">
    <br>
    <table class="table table-striped table-hover table-bordered w-100 positionTable" id="positionTable">
        <thead class="text-white" style="background-color:#0d1a80;">
            <tr>
                <th class="fixedCol">
                    <input type="search" id="filter1" class="form-control filter-input" data-column="0" style="border:1px solid #683817"/>
                    JOB POSITION
                </th>
                <th>
                    <input type="search" class="form-control filter-input" data-column="1" style="border:1px solid #683817"/>
                    JOB DESCRIPTION
                </th>
                <th>
                    <input type="search" class="form-control filter-input" data-column="2" style="border:1px solid #683817"/>
                    JOB REQUIREMENTS/SKILLS
                </th>
            </tr>
        </thead>
            <tbody title="CLICK TO EDIT">
            </tbody>
    </table>

    @include('modals.addPosition')
</div>