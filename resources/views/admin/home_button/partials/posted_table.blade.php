<h5>Shows only latest 20</h5>
<table class="table table-striped table-hover table-bordered" id="posted_request_table">
    <thead>
    <tr role="row">
        <th>
            Requested User
        </th>
        <th>
            Requested Date
        </th>
        <th>
            Home Button Address
        </th>
        <th>
            Verification Status
        </th>
        <th>

        </th>
    </tr>
    </thead>
    <tbody>
    @if(isset($requestByPostPosted))
        @foreach($requestByPostPosted as $pendingRequest)
            <tr>
                <td>{{$pendingRequest['requested_by']['full_name']}}</td>
                <td>{{date('d/M/Y',strtotime($pendingRequest['created_at']))}}</td>
                <td>{{$pendingRequest['requested_by']['home_button']['full_address_string']}}</td>
                <td>{{$pendingRequest['user_action_status']}}</td>
                <td>
                    <a href="{{route('home-button.request.revert',$pendingRequest['id'])}}"
                       class="btn btn-info btn-xs edit"><i class="fa fa-info"></i>
                        Revert</a>
                    {!!displayDeleteForm(route('home-button.request.destroy',$pendingRequest['id']))!!}
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>