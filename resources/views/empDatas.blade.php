        <div class="panel-body">
          <div class="table-responsive">
            @csrf
            <table id="editable" class="table table-bordered table-striped">
              <thead>
                <tr>
                    <th>Id</th>
                    <th>Employee No.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Company</th>
                    <th>Salary</th>
                    <th>Start date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $empData)
                <tr>
                    <td>{{$empData->id}}</td>
                    <td>{{$empData->employee_no}}</td>
                    <td>{{$empData->name}}</td>
                    <td>{{$empData->getDesignations->title}}</td>
                    <td>{{$empData->department}}</td>
                    <td>{{$empData->company}}</td>
                    <td>{{number_format($empData->salary,2)}} BDT</td>
                    <td>
                      {{date('d-m-Y', strtotime($empData->joining_date))}}
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

{!! $data->render() !!}