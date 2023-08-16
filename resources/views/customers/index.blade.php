@extends('layouts.app')
@section('content')
    <main class="py-6">
        <h1 class="text-xl md:text-5xl text-center font-bold py-10">Customer Module Crud App</h1>
        <div class="container mx-auto flex justify-between py-5 border-b">
            <div class="left flex gap-3">
                <a href="{{ route('customers.create')}}"
                    class="flex bg-indigo-500 text-white px-4 py-2 border rounded-md hover:border-indigo-500 hover:text-gray-800">
                    Add Customer
                </a>
            </div>
        </div>
        <div class="container mx-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-800">
                        <th class="px-16 py-2">
                            <span class="text-gray-200">Name</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-200">Gender</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-200">Contact Number</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-200">Address</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-200">Email</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-200">Status</span>
                        </th>
                        <th class="px-16 py-2">
                            <span class="text-gray-200">Action</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-200">
                    @foreach($customers as $customer)
                    <tr class="bg-gray-50 text-center">
                        <td class="px-16 py-2 flex items-center justify-center"> <!-- Adjusted classes for centering -->
                            <span class="font-semibold">{{ $customer->name }}</span> <!-- Removed unnecessary ml-2 -->
                        </td>
                        <td class="px-16 py-2">
                            <span>{{ $customer->gender }}</span>
                        </td>
                        <td class="px-16 py-2">
                            <span>{{ $customer->contact_number }}</span>
                        </td>
                        <td class="px-16 py-2">
                            <span>{{ $customer->address }}</span>
                        </td>
                        <td class="px-16 py-2">
                            <span>{{ $customer->email }}</span>
                        </td>
                        <td class="px-16 py-2">
                            <span class="{{ $customer->status ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} px-2 py-1 rounded-full">
                                {{ $customer->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="px-16 py-2 flex justify-around gap-5">
                            <a href="{{ route('customers.edit', $customer->id) }}"
                                class="label label-warning bg-yellow-400 text-center text-white px-3 flex cursor-pointer border rounded-md ">Edit</a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this customer?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="label label-danger bg-red-400 text-center text-white px-3 flex cursor-pointer border rounded-md">Delete</button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
