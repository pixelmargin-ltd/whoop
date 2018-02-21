<table class="table table-striped table-hover table-bordered" id="pending_request_table">
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
            Unique Code to Post
        </th>
        <th>

        </th>
    </tr>
    </thead>
    <tbody>
    @if(isset($requestByPostPending))
        @foreach($requestByPostPending as $pendingRequest)
            <tr>
                <td>{{$pendingRequest['requested_by']['full_name']}}</td>
                <td>{{date('d/M/Y',strtotime($pendingRequest['created_at']))}}</td>
                <td>{{$pendingRequest['requested_by']['home_button']['full_address_string']}}</td>
                <td>{{$pendingRequest['requested_by']['home_button']['unique_code']}}</td>
                <td>
                    <a href="{{route('home-button.request.posted',$pendingRequest['id'])}}"
                       class="btn btn-info btn-xs edit"><i class="fa fa-info"></i>
                        Posted</a>
                    {!!displayDeleteForm(route('home-button.request.destroy',$pendingRequest['id']))!!}
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>