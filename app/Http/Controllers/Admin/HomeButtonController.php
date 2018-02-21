<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\RequestCodeByPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeButtonController extends Controller
{
    /**
     * List all request for unlock by post
     *
     * @return $this
     */
    public function listHomeButtons()
    {
        $requestByPostPending = RequestCodeByPost::where('posting_status',
            RequestCodeByPost::POSTING_STATUS_PENDING)
            ->with('requested_by')->get();

        $requestByPostPosted = RequestCodeByPost::where('posting_status',
            RequestCodeByPost::POSTING_STATUS_POSTED)->with('requested_by')
            ->orderBy('updated_at')->limit(20)->get();

        return view('admin.home_button.list')->with('requestByPostPending', $requestByPostPending)
            ->with('requestByPostPosted', $requestByPostPosted);
    }

    /**
     * Set request status to posted
     *
     * @param $request_id
     * @return $this
     */
    public function codePosted($request_id)
    {
        $request = RequestCodeByPost::find($request_id);
        if ($request instanceof RequestCodeByPost) {
            $request->posting_status = RequestCodeByPost::POSTING_STATUS_POSTED;
            $request->save();
            return back()->withSuccess('Request Set to Posted Status Successfully.');
        } else {
            return back()->withErrors(['Home Button Unlock By Post Request Not Found.']);
        }
    }

    /**
     * Set request status to pending
     *
     * @param $request_id
     * @return $this
     */
    public function revertStatus($request_id)
    {
        $request = RequestCodeByPost::find($request_id);
        if ($request instanceof RequestCodeByPost) {
            $request->posting_status = RequestCodeByPost::POSTING_STATUS_PENDING;
            $request->save();
            return back()->withSuccess('Request Set to Pending Status Successfully.');
        } else {
            return back()->withErrors(['Home Button Unlock By Post Request Not Found.']);
        }
    }

    /**
     * Remove a request
     *
     * @param $request_id
     * @return $this
     */
    public function destroy($request_id)
    {
        if (RequestCodeByPost::destroy($request_id)) {
            return back()->withSuccess('Deleetd Request Successfully.');
        } else {
            return back()->withErrors(['Delete of Request Failed.']);
        }
    }
}
