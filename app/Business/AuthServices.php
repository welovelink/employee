<?php

namespace App\Business;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class AuthServices
{

    public function __construct()
    {

    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        /*if (!auth()->validate($credentials)) {
            return (object)[
                'response'   => [
                    'status'  => 'error',
                    'request' => $credentials,
                ],
                'httpStatus' => Response::HTTP_UNAUTHORIZED,
            ];
        } else {
            $user = User::where('email', $credentials['email'])->first();
            $user->tokens()->delete();
            $token = $user->createToken($request->server('HTTP_USER_AGENT'), [$user->role]);
            return (object)[
                'response'   => [
                    'status'      => 'ok',
                    'role'        => $user->role,
                    'accessToken' => $token->plainTextToken,
                ],
                'httpStatus' => Response::HTTP_OK,
            ];
        }*/

        if (!Auth::attempt($credentials)) {
            return (object)[
                'response'   => (object)[
                    'status'  => 'error',
                    'request' => $credentials,
                ],
                'httpStatus' => Response::HTTP_UNAUTHORIZED,
            ];
        }

        return (object)[
            'response'   => (object)[
                'status'      => 'ok',
            ],
            'httpStatus' => Response::HTTP_OK,
        ];
    }

    public function isManager()
    {

    }

}
