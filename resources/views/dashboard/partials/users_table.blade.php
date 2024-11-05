      <!-- component -->
      <div class="text-gray-900 bg-gray-200">
        <div class="p-4 flex">
            <h1 class="text-3xl">Users</h1>
        </div>
        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">
                <tbody>


                    <tr class="border-b">
                        <th class="text-left p-3 px-5">Name</th>
                        <th class="text-left p-3 px-5">Email</th>
                        @role(['admin'])
                        <th class="text-left p-3 px-5">Role</th>
                        @endRole
                        <th class="text-left p-3 px-5">Block User</th>
                        <th></th>
                    </tr>

                    @foreach ($users->reverse() as $user)
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <td class="p-3 px-5">
                                <div>{{ $user->name }}</div>
                            </td>
                            <td class="p-3 px-5">
                                <div>{{ $user->email }}</div>
                            </td>
                            @role(["admin"])
                            <td class="p-3 px-5">
                                <form method="post" action="{{ route('moderator', $user->id) }}">
                                    @method('PUT')
                                    @csrf
                                    <input name="user_id" type="hidden" value="{{ $user->id }}">
                                    <button class="bg-gray-800 text-white px-2 py-2 rounded-lg ">
                                        @if ($user->hasRole(['moderator']))
                                            Remove Moderator
                                        @else
                                            Add as Moderator
                                        @endif

                                    </button>
                                </form>

                            </td>
                            @endRole
                            <td class="p-3 px-5 flex">

                                @role(['admin'])
                                    <form method="post" action="{{ route('block', $user) }}">
                                        @csrf
                                        @method('PUT')
                                        <input name="user" type="hidden" value="{{ $user->id }}">
                                        <button
                                            class="text-sm {{ $user->deleted ? "bg-green-500" : "bg-red-500" }} text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">{{ $user->deleted ? "Unblock User" : "Block User" }}</button>
                                    </form>
                                @endRole
                                @role(['moderator'])
                                        <button
                                            class="text-sm  text-red-500 py-1 px-2 rounded focus:outline-none focus:shadow-outline">{{ $user->deleted ? "Blocked user" : "" }}</button>
                                @endRole

                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>

        </div>
    </div>