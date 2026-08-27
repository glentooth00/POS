
<?php

use Livewire\Component;

new class extends Component
{
    //
};

?>

<div class="space-y-6">

    {{-- Header --}}
    <div>
        <flux:heading size="xl">
            Create User
        </flux:heading>

        <flux:text class="mt-1">
            Create a new user account for the POS system.
        </flux:text>
    </div>

    <flux:separator />

    {{-- User Information --}}
    <div class="space-y-6">

        <flux:heading size="lg">
            User Information
        </flux:heading>

        {{-- Row 1 --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

            <flux:input
                label="First Name"
                placeholder="Enter first name"
            />

            <flux:input
                label="Middle Name"
                placeholder="Enter middle name"
            />

            <flux:input
                label="Last Name"
                placeholder="Enter last name"
            />

        </div>

        {{-- Row 2 --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

            <flux:select
                label="Gender"
                placeholder="Select gender"
            >
                <flux:select.option value="Male">
                    Male
                </flux:select.option>

                <flux:select.option value="Female">
                    Female
                </flux:select.option>

                <flux:select.option value="Other">
                    Other
                </flux:select.option>
            </flux:select>

            <flux:input
                label="Username"
                placeholder="Enter username"
            />

            <flux:input
                type="password"
                label="Password"
                placeholder="Enter password"
            />

        </div>

        {{-- User Image --}}
        <div class="max-w-md">

            <flux:field>

                <flux:label>
                    User Image
                </flux:label>

                <flux:input
                    type="file"
                    accept="image/png,image/jpeg,image/jpg"
                />

                <flux:description>
                    Upload a JPG or PNG image.
                </flux:description>

            </flux:field>

        </div>

    </div>

    <flux:separator />

    {{-- Actions --}}
    <div class="flex items-center justify-end gap-3">

        <flux:button
            variant="ghost"
            icon="x-mark"
            href="{{ route('users.index') }}"
        >
            Cancel
        </flux:button>

        <flux:button
            variant="primary"
            icon="check"
            type="submit"
        >
            Create User
        </flux:button>

    </div>

</div>

