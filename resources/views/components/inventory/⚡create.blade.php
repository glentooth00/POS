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
            Create Inventory Item
        </flux:heading>

        <flux:text class="mt-1">
            Add a new item to your inventory.
        </flux:text>
    </div>

    <flux:separator />

    {{-- Item Information --}}
    <div class="space-y-6">

        <flux:heading size="lg">
            Item Information
        </flux:heading>

        {{-- Row 1 --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

            <flux:input
                label="Item Name"
                placeholder="Enter item name"
            />

            <flux:input
                label="Item Code / SKU"
                placeholder="Enter item code or SKU"
            />

            <flux:select
                label="Category"
                placeholder="Select category"
            >
                <flux:select.option value="food">
                    Food
                </flux:select.option>

                <flux:select.option value="beverage">
                    Beverage
                </flux:select.option>

                <flux:select.option value="electronics">
                    Electronics
                </flux:select.option>

                <flux:select.option value="office">
                    Office Supplies
                </flux:select.option>

                <flux:select.option value="other">
                    Other
                </flux:select.option>
            </flux:select>

        </div>

        {{-- Row 2 --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

            <flux:input
                label="Brand"
                placeholder="Enter brand"
            />

            <flux:select
                label="Unit"
                placeholder="Select unit"
            >
                <flux:select.option value="piece">
                    Piece
                </flux:select.option>

                <flux:select.option value="box">
                    Box
                </flux:select.option>

                <flux:select.option value="pack">
                    Pack
                </flux:select.option>

                <flux:select.option value="bottle">
                    Bottle
                </flux:select.option>

                <flux:select.option value="kilo">
                    Kilogram
                </flux:select.option>

                <flux:select.option value="liter">
                    Liter
                </flux:select.option>
            </flux:select>

            <flux:input
                type="number"
                label="Current Stock"
                placeholder="Enter current stock"
                min="0"
            />

        </div>

        {{-- Row 3 --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">

            <flux:input
                type="number"
                label="Cost Price"
                placeholder="0.00"
                min="0"
                step="0.01"
            />

            <flux:input
                type="number"
                label="Selling Price"
                placeholder="0.00"
                min="0"
                step="0.01"
            />

            <flux:input
                type="number"
                label="Reorder Level"
                placeholder="Enter reorder level"
                min="0"
            />

        </div>

        {{-- Item Image --}}
        <div class="max-w-md">

            <flux:field>

                <flux:label>
                    Item Image
                </flux:label>

                <flux:input
                    type="file"
                    accept="image/png,image/jpeg,image/jpg"
                />

                <flux:description>
                    Upload a JPG or PNG image of the item.
                </flux:description>

            </flux:field>

        </div>

        {{-- Description --}}
        <div>

            <flux:textarea
                label="Description"
                placeholder="Enter item description..."
                rows="4"
            />

        </div>

    </div>

    <flux:separator />

    {{-- Actions --}}
    <div class="flex items-center justify-end gap-3">

        <flux:button
            variant="ghost"
            icon="x-mark"
            href="{{ route('inventory.index') }}"
        >
            Cancel
        </flux:button>

        <flux:button
            variant="primary"
            icon="check"
            type="submit"
        >
            Create Item
        </flux:button>

    </div>

</div>

