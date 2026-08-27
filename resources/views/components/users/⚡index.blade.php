<?php

use Livewire\Component;

new class extends Component
{
    public array $users = [
        [
            'id' => 1,
            'firstname' => 'Juan',
            'middlename' => 'Santos',
            'lastname' => 'Dela Cruz',
            'gender' => 'Male',
            'username' => 'juan.delacruz',
            'role' => 'Administrator',
            'status' => 'Active',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtygbQID5rHpIO-3pDJu2XO4i32XUp1MGl9FtwCMswCinIeea4GLF_BQQ&s=10',
        ],
        [
            'id' => 2,
            'firstname' => 'Maria',
            'middlename' => 'Garcia',
            'lastname' => 'Santos',
            'gender' => 'Female',
            'username' => 'maria.santos',
            'role' => 'Cashier',
            'status' => 'Active',
            'image' => 'https://raketcontent.com/1/2x2_pic_74eb4eeef0.jpg',
        ],
        [
            'id' => 3,
            'firstname' => 'Pedro',
            'middlename' => 'Reyes',
            'lastname' => 'Cruz',
            'gender' => 'Male',
            'username' => 'pedro.cruz',
            'role' => 'Cashier',
            'status' => 'Inactive',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQSIctJHLG-lQnHlJsonMhsM4tNh14y1rps5T6F-MmBEw&s=10',
        ],
        [
            'id' => 4,
            'firstname' => 'Ana',
            'middlename' => 'Lopez',
            'lastname' => 'Garcia',
            'gender' => 'Female',
            'username' => 'ana.garcia',
            'role' => 'Manager',
            'status' => 'Active',
            'image' => 'https://i.pinimg.com/736x/9a/34/80/9a34803572876920a0d6254bbc0d0346.jpg',
        ],
        [
            'id' => 5,
            'firstname' => 'Michael',
            'middlename' => 'Tan',
            'lastname' => 'Reyes',
            'gender' => 'Male',
            'username' => 'michael.reyes',
            'role' => 'Cashier',
            'status' => 'Active',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTD24HnQQ3Xaxx8j5VG1-NJdynhWu9wj-RBprSMjsc17GTGqxldIEQK60g&s=10',
        ],
    ];
};

?>

<div class="space-y-6">

    {{-- Header --}}
    <div>

        <flux:heading size="xl">
            Users
        </flux:heading>

        <flux:text class="mt-1">
            Manage system users and their access.
        </flux:text>

    </div>

    <flux:separator />

    {{-- Add User Button --}}
    <div>

        <flux:button
            variant="primary"
            icon="user-plus"
            color="blue"
            href="{{ route('user.create') }}"
        >
            Add User
        </flux:button>

    </div>


    {{-- Users Table --}}
    <flux:table>

        <flux:table.columns>

            <flux:table.column>
                User
            </flux:table.column>

            <flux:table.column>
                Gender
            </flux:table.column>

            <flux:table.column>
                Username
            </flux:table.column>

            <flux:table.column>
                Role
            </flux:table.column>

            <flux:table.column>
                Status
            </flux:table.column>

            <flux:table.column>
            </flux:table.column>

        </flux:table.columns>


        <flux:table.rows>

            @foreach ($users as $user)

                <flux:table.row :key="$user['id']">

                    {{-- User --}}
                    <flux:table.cell class="flex items-center gap-3">

                        <flux:avatar
                            size="sm"
                            src="{{ $user['image'] ?? asset('images/default-user.png') }}"
                        />

                        <div>

                            <flux:text class="font-medium">

                                {{ $user['firstname'] }}
                                {{ $user['middlename'] }}
                                {{ $user['lastname'] }}

                            </flux:text>

                            <flux:text
                                size="sm"
                                class="text-zinc-500"
                            >
                                {{ $user['username'] }}
                            </flux:text>

                        </div>

                    </flux:table.cell>


                    {{-- Gender --}}
                    <flux:table.cell>

                        {{ $user['gender'] }}

                    </flux:table.cell>


                    {{-- Username --}}
                    <flux:table.cell class="whitespace-nowrap">

                        {{ $user['username'] }}

                    </flux:table.cell>


                    {{-- Role --}}
                    <flux:table.cell>

                        <flux:badge
                            size="sm"
                            color="zinc"
                        >
                            {{ $user['role'] }}
                        </flux:badge>

                    </flux:table.cell>


                    {{-- Status --}}
                    <flux:table.cell class="py-0">

                        @if ($user['status'] === 'Active')

                            <flux:badge
                                size="sm"
                                color="green"
                            >
                                Active
                            </flux:badge>

                        @else

                            <flux:badge
                                size="sm"
                                color="red"
                            >
                                Inactive
                            </flux:badge>

                        @endif

                    </flux:table.cell>


                    {{-- Actions --}}
                    <flux:table.cell class="py-0">

                        <flux:button
                            variant="ghost"
                            size="sm"
                            icon="ellipsis-horizontal"
                        />

                    </flux:table.cell>

                </flux:table.row>

            @endforeach

        </flux:table.rows>

    </flux:table>

</div>
