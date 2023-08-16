@extends('layouts.app')
@section('content')
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 ">
            <h2 class="text-2xl font-semibold mb-4">Edit Customer</h2>
            <div>
                @if ($errors->any())
                    <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                      @endforeach
                    </ul>
                @endif
            </div>
            <div class=" bg-white border rounded-md p-4 shadow-sm">
                <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="max-w-md">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ $customer->name }}"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        >
                    </div>
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" id="gender"
                            class="mt-1 p-2 w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            >
                            <option value="Male" {{ $customer->gender === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $customer->gender === 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $customer->gender === 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number"
                            value="{{ $customer->contact_number }}"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            >
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <textarea name="address" id="address" rows="3"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            >{{ $customer->address }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email"
                            value="{{ $customer->email }}"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            >
                    </div>
                    <div class="mb-4">
                      <label class="inline-flex items-center ml-6">
                        <input type="radio" name="status" value="1" class="form-radio"
                            {{ $customer->status == 1 ? 'checked' : '' }}>
                        <span class="ml-2">Active</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input type="radio" name="status" value="0" class="form-radio"
                            {{ $customer->status == 0 ? 'checked' : '' }}>
                        <span class="ml-2">Inactive</span>
                    </label>
                        
                    </div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-md">Update
                        Customer</button>
                    <a href="{{ route('customers.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 py-2 px-4 rounded-md ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection