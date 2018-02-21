<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\HomeButton;
use App\Models\Admin\Invitation;
use App\Models\Admin\User;
use App\Models\Admin\RequestCodeByPost;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class HomeButtonController extends Controller
{
    /**
     * Add User Parameters that `need to be returned` and `Limited to` in this array.
     * Only parameter's specified in this array will be returned.
     * Only fields in `users` Table are valid entries.
     */
    const PARAMS = [
        'id', 'firstname', 'lastname',
        'address', 'country', 'zipcode', 'city',
        'mobile', 'email', 'photo'
    ];

    /**
     * Get Family Members (Users linked to the same Home Button)
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFamily(Request $request)
    {
        //Api Authentication
        if (Auth::guard('api')->check()) {
            //Get current user
            /** @var User $user */
            $user = Auth::guard('api')->user();

            if ($user->home_button instanceof HomeButton) {
                //Home Button Exists
                if ($user->home_button_status == HomeButton::STATUS_UNLOCKED) {
                    //Get Parameters to return
                    if ($request->exists('params')) {
                        $parameters = explode(',', $request->input('params'));
                        //Validate Parameters Request
                        $paramDifference = array_diff($parameters, self::PARAMS);
                        if (count($paramDifference) > 0) {
                            //Invalid parameter exists
                            return response()->json([
                                'status' => 'Error',
                                'message' => 'Request Has Invalid Parameters('
                                    . implode(',', $paramDifference) . ').'
                            ], 422);
                        }
                    } else {
                        $parameters = self::PARAMS;
                    }

                    //Home Button is Unlocked. Get Family
                    //TODO : IF current user detail is not needed, modify here.
                    $family = $user->home_button->family()->select($parameters)->get();

                    //Success response with Family Data
                    return response()->json([
                        'status' => 'Success',
                        'data' => $family
                    ], 200);
                } else {
                    //Home Button is Locked
                    return response()->json([
                        'status' => 'Error',
                        'message' => 'Home Button is Locked.'
                    ], 500);
                }
            } else {
                //Home Button doesn't exist
                return response()->json([
                    'status' => 'Error',
                    'message' => 'Home Button not Found for current User.'
                ], 500);
            }
        } else {
            //Api Authentication Failed
            return response()->json([
                'status' => 'Error',
                'message' => 'Api Authentication Failed.'
            ], 401);
        }
    }

    /**
     * Request for home button code by user postal address to unlock the button
     * POST - api/user/home_button/request_code/by_post
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function requestCodeByPost(Request $request)
    {
        //User Authentication
        if (Auth::guard('api')->check()) {
            //Get the current user
            $user = Auth::guard('api')->user();

            // Create home button if user have address information
            if ($user->city AND $user->zipcode AND $user->country AND $user->address) {
                // check if user have home button, if not create one
                if (!$user->home_button instanceof HomeButton) {
                    // Create home button for user 
                    $user = $user->createHomeButton();
                }

                // check if user already requested
                if ($user->requestCodeByPost instanceof RequestCodeByPost) {
                    return response()->json([
                        'status' => 'Error',
                        'message' => 'This user already requested for code by post.'
                    ], 500);
                }

                // create request now
                $user->createRequestCodeByPost();

                return response()->json([
                    'status' => 'Success',
                    'message' => 'Your request has been accepted and you should get the code within 2 days normally.'
                ], 200);

            } else {
                // User don't have address details
                return response()->json([
                    'status' => 'Error',
                    'message' => 'User don\'t have address details yet. Please update address first before requesting for code.'
                ], 500);
            }
        } else {
            //User Authentication Failed
            return response()->json([
                'status' => 'Error',
                'message' => 'Unathenticated User.'
            ], 401);
        }
    }

    /**
     * Delete yourself from the home button
     * DELETE - api/user/home_button/
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteYourself()
    {
        //User Authentication
        if (Auth::guard('api')->check()) {
            //Get the current user
            /** @var User $user */
            $user = Auth::guard('api')->user();

            //Remove the home button from user
            $user->removeHomeButton();

            return response()->json([
                'status' => 'Success',
                'message' => 'Your request has been accepted and You don\'t have a home button now.',
                'data' => new UserResource($user)
            ], 200);

        } else {
            //User Authentication Failed
            return response()->json([
                'status' => 'Error',
                'message' => 'Unauthenticated User.'
            ], 401);
        }
    }

    public function invitedAutoFill(Request $request)
    {
        $this->validate($request, [
            'invited_email' => [
                'required',
                'email',
                Rule::exists('invitation', 'to_email')->where(function ($query) {
                    $query->where('status', Invitation::STATUS_PENDING);
                })
            ],
            'unique_code' => 'required|exists:home_button,unique_code'
        ], [
            'invited_email.exists' => 'This email didn\'t receive an invitation or 
            Invitation already accepted.',
            'unique_code.exists' => 'Invalid Unique Code.'
        ]);

        //Check if email already registered
        $registeredUser = User::where('email', $request->input('invited_email'))->first();
        if (!$registeredUser instanceof User) {
            //Return data on success
            return response()->json([
                'status' => 'Success',
                'data' => [
                    'email' => $request->input('invited_email'),
                    'home_button' => HomeButton::where('unique_code', $request
                        ->input('unique_code'))->first()
                ]
            ], 200);
        } else {
            //Email Already registered
            return response()->json([
                'status' => 'Error',
                'message' => 'Email already registered.'
            ], 401);
        }
    }
}
