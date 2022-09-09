<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $paginator = $this->model->paginate($request->get('limit', config('app.pagination_limit')));
        if ($request->has('limit')) {
            $paginator->appends('limit', $request->get('limit'));
        }
        return fractal($paginator, new UserTransformer())->respond(200);
    }
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
      
            $input = $request->validate([
                'email' => ['required', 'email', 'exists:users'],
                'password' => ['required', 'string'],               
            ]);
            $user = User::query()
                ->where('email', $input['email'])
                ->first();
            if (empty($user)) {
                throw ValidationException::withMessages([
                    'email' => ['Account not registered ']
                ]);
            }
            $user->tokens()->delete();      
       
            
    
            return response()->json([
                'message' => 'OK',
                'data' => [
                    'auth_token' => $user->createToken('token')->plainTextToken
                ]
            ]);
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules=[
            'name' => ['required', 'string', 'max:255'],           
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', Password::defaults()],
        ];
        $this->validate($request, $rules);
        $request['password'] = Hash::make($request['password']);
        $user =$this->model->create($request->all());        
        return fractal($user, new UserTransformer())->respond(201);      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return fractal($user, new UserTransformer())->respond(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $rules=[
            'name' => ['required', 'string', 'max:255'],           
            'email' => ['required', 'email',Rule::unique('users', 'email')->ignore(auth()->id())],
            'password' => ['nullable', Password::defaults()],
        ];
        $this->validate($request, $rules);
        if($request->has('password'))
        $request['password'] = Hash::make($request['password']);
        $user->update($request->all());        
        return fractal($user->fresh(), new UserTransformer())->respond(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
