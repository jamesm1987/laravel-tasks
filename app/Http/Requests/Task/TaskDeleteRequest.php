<?php

namespace App\Http\Requests\Task;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use App\Models\Task;

class TaskDeleteRequest extends FormRequest
{
   
   
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        $model = $this->route('task');


        return Gate::allows('delete', $model);
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [];
    }
}
